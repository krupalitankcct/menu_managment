Run bellow command to install
    
    composer require menus/menumanagement

### Migration

    php artisan migrate

### Configuration

If you want to change these options, you'll have to publish the `config` file.

    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="config"
    
This will give you a `menu.php` config file in which you can make the changes.

    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="migrations"
    
Then run bellow command to publish config and resource files

    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="views"

    php artisan vendor:publish --provider="Menu\Menumanagment\MenuServiceProvider" --tag="lang"
