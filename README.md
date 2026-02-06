# PHP_laravel12_Laracast

## Project Description

PHP_laravel12_Laracast is a simple Laravel 12 project created to demonstrate the installation, configuration, and usage of Larastan (PHPStan for Laravel).

The main goal of this project is to help beginners understand how to analyze Laravel code for errors, type issues, and bad practices before runtime using Larastan.


## This project shows:

- How to set up Larastan in a Laravel 12 application

- How Larastan detects coding mistakes in controllers

- How to fix errors and re-check code quality

- How to maintain clean and reliable Laravel code

Larastan runs from the terminal, without starting a server or opening a browser, making it a powerful tool for static code analysis, learning best practices, and interview preparation.

## Key Highlights

- Laravel 12.* project

- Larastan configured with phpstan.neon

- Beginner-friendly strictness level

- Step-by-step setup and verification

- Clean and understandable example


---



# Project Setup 

---

## STEP 1: Create New Laravel 12 Project

### Run Command :

```
composer create-project laravel/laravel PHP_laravel12_Laracast "12.*"

```

### Go inside project:

```
cd PHP_laravel12_Laracast

```

##### Explanation:

This step creates a fresh Laravel 12 application.

All Larastan configuration will be done inside this project.




## STEP 2: Install Larastan 

### Only this command:

```
composer require larastan/larastan --dev

```

##### Explanation:

Larastan is installed as a development dependency for code analysis.

It will not affect production or runtime performance.




## STEP 3: Create phpstan.neon (MOST IMPORTANT FILE)

### In PHP_laravel12_Laracast root folder, create file:
```
 phpstan.neon

```


### Open phpstan.neon:

```

includes:
    - vendor/larastan/larastan/extension.neon

parameters:
    paths:
        - app

    level: 5

    excludePaths:
        - vendor
        - storage
        - bootstrap/cache

```

##### Explanation:

This file contains configuration rules for Larastan.

It tells Larastan which folders to scan and how strict the checks should be.

Make sure file name is phpstan.neon.



## STEP 4: Create Test Controller 

### Run:

```
php artisan make:controller CheckController

```

### Open file: app/Http/Controllers/CheckController.php

```

<?php

namespace App\Http\Controllers;

class CheckController extends Controller
{
    public function test()
    {
        $number = 10;
        return strtoupper($number); //  wrong on purpose
    }
}

```

##### Explanation:

This controller is used to test whether Larastan can detect errors.

Wrong code is written intentionally for verification.



## STEP 5: Run Larastan (THIS IS THE CHECK)

### Windows:

```
vendor\bin\phpstan analyse

```

### Linux / Mac:

```
./vendor/bin/phpstan analyse

```
##### Explanation:

This command runs Larastan from the terminal.

It analyzes the Laravel application code based on the configuration file.



## STEP 6: READ THIS OUTPUT CAREFULLY

### You MUST see an error like this:


<img width="1469" height="393" alt="Screenshot 2026-02-06 120927" src="https://github.com/user-attachments/assets/3b43f026-fb5b-4aa0-87c6-38af4e95a020" />


##### Explanation:

Larastan is WORKING correctly

Larastan reports the type error found in the controller.

This confirms Larastan is working correctly.



## STEP 7: Fix the Error (FINAL CONFIRMATION)

### Edit controller:

```
 public function test()
    {
        $number = "10";   // now string
        return strtoupper($number);
    }

```

##### Explanation:

The data type is corrected to resolve the error.

After fixing, Larastan should not report any issues.




## Step 8: Run Larastan (again)

### Windows:

```
vendor\bin\phpstan analyse

```

### Linux / Mac:

```
./vendor/bin/phpstan analyse

```

##### Explanation:

This final run confirms that all errors are fixed.

A successful result means the code is clean.


### Final Output:


<img width="1465" height="250" alt="Screenshot 2026-02-06 121012" src="https://github.com/user-attachments/assets/c0855a35-617d-4d84-a3e0-77494d9bb44a" />



---

# Project Folder Structure:

```
PHP_laravel12_Laracast/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── CheckController.php
│
├── vendor/
├── phpstan.neon
├── artisan
└── composer.json

```
