If you're using Laravel 8, this is all there is to do.

Run bellow command to install

composer require menus/menumanagement

Then follow bellow steps

1.php artisan migrate

### Configuration

If you want to change these options, you'll have to publish the `config` file.
    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="config"
This will give you a `menu.php` config file in which you can make the changes.

To make your life easy, the package also includes a ready to use `migration` which you can publish by running:
    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="migrations"
    
Then run bellow command to publish config and resource files

php artisan vendor:publish --provider="menus\menumanagement\MenuServiceProvider" --tag="views"

php artisan vendor:publish --provider="menus\menumanagement\MenuServiceProvider" --tag="lang"
