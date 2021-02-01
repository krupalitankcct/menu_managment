If you're using Laravel 8, this is all there is to do.

Run bellow command to install

composer require menus/menu-package

Now all you have to do is add the service provider of the package and alias the package. To do this open your `config/app.php` file.
Should you still be on version 8 of Laravel, the final steps for you are to add the service provider of the package and alias the package. To do this open your `config/app.php` file.

Add a new line to the `providers` array:

	Menu\\Menumanagment\\MenuServiceProvider::class

Now you're ready to start using the cmsPackage in your application.

Then follow bellow steps

1.php artisan migrate

**As of version 1 of this package it's possibly to use dependency injection to inject an instance of the Cart class into your controller or other class**
## Overview
Look at one of the following topics to learn more about LaravelMenuManagement
* [Usage](#usage)
* [Collections](#collections)
* [Instances](#instances)
* [Models](#models)
* [Database](#database)
* [Exceptions](#exceptions)
* [Events](#events)
* [Example](#example)

### Configuration

If you want to change these options, you'll have to publish the `config` file.
    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="config"
This will give you a `menu.php` config file in which you can make the changes.

To make your life easy, the package also includes a ready to use `migration` which you can publish by running:
    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="migrations"
    
This will place a `Menudatabase` table's migration file into `database/migrations` directory. Now all you have to do is run `php artisan migrate` to migrate your database.

Then run bellow command to publish config and resource files

php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="views"

php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="lang"
