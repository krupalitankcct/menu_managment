<?php 

namespace menus\menumanagement;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use menus\menumanagement\View\Components\MenuAdd;
use menus\menumanagement\View\Components\MenuEdit;
use menus\menumanagement\View\Components\MenuList;
use menus\menumanagement\View\Components\MenuItemAdd;
use menus\menumanagement\View\Components\MenuItemEdit;
use menus\menumanagement\View\Components\MenuItemList;
use menus\menumanagement\View\Components\MenuPage;
use Artisan;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        $this->loadMigrationsFrom(__DIR__.'/./../database/migrations');
        $this->loadViewsFrom(__DIR__.'/./../resources/views','menu');
        
        $this->publishes([
        __DIR__.'/./../resources/views' => resource_path('views/menu/'),
        ]);
        $this->loadTranslationsFrom(__DIR__.'/./../resources/lang', 'package_lang');

        $this->publishes([
        __DIR__.'/./../resources/lang/en' => resource_path('lang/en/menu/'),
        ]);

        $this->mergeConfigFrom(__DIR__.'/../config/constant.php', 'menu');

        $this->app['router']->namespace('menus\menumanagement\Http\Controllers\Backend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
                });

         $this->app['router']->namespace('menus\menumanagement\Http\Controllers\Frontend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/Routes/menupage.php');
                });


        $this->publishes([
        __DIR__.'/../config/constant.php' => config_path('menu.php'),
        ]);

        $this->publishes([__DIR__.'/./../public' => public_path('menu'),
            ], 'asset');

        $this->publishes([__DIR__.'/./../database/migrations' => database_path('migrations'),
            ], 'migration');

        $this->publishes([__DIR__.'/routes/web.php' => base_path('routes/menu.php'),
            ], 'route');

        $this->publishes([__DIR__.'/http/controllers/Backend' => base_path('app/http/controllers/backend/menu/'),
            ], 'controller');

        $this->publishes([__DIR__.'/http/controllers/Frontend' => base_path('app/http/controllers/frontend/menu/'),
            ], 'controller');

         $this->publishes([__DIR__.'/Models' => base_path('app/Models'),
            ], 'models');
        
        $this->loadViewComponentsAs('courier', [
            MenuAdd::class,
            MenuEdit::class,
            MenuList::class,
            MenuItemAdd::class,
            MenuItemEdit::class,
            MenuItemList::class,
            MenuPage::class
        ]);

        Artisan::call('vendor:publish --tag="asset"');   
    }
    public function register()
    {
       $this->app->bind('Menu', function($app) {
        return new Menu();
        }); 
    }
}