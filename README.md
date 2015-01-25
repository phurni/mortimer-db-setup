# DbSetup

Laravel 4 package that adds the missing artisan commands db:setup, db:create, db:drop

Copyright (C) 2015 Pascal Hurni <[https://github.com/phurni](https://github.com/phurni)>

Licensed under the [MIT License](http://opensource.org/licenses/MIT).

## Installation

1. Add `mortimer/db-setup` as a requirement to `composer.json`:

    ```javascript
    {
        "require": {
            "mortimer/db-setup": "dev-master"
        }
    }
    ```

   Update your packages with `composer update` or install with `composer install`.

2. Add the service provider

   Open `app/config/app.php` and add the following item to the service providers array:

       'Mortimer\DbSetup\DbSetupServiceProvider'

## Commands

Three new `artisan` commands are now available:

* `db:create`
  Create the database for the current environment.

* `db:drop`
  Drop the database for the current environment.

* `db:setup`
  Run a batch of other artisan commands: db:create, migrate, db:seed


The command you will use the most is `db:setup`, this is the typical command you run
when grabbing an existing project, run it just after `composer install` or `composer update`,
but don't forget to set the database config just before.

    php artisan db:setup

