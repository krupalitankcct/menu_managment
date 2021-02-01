<?php 

namespace Menu\Menumanagment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Menu\Menumanagment\View\Components\MenuAdd;
use Menu\Menumanagment\View\Components\MenuEdit;
use Menu\Menumanagment\View\Components\MenuList;
use Menu\Menumanagment\View\Components\MenuHeader;
use Menu\Menumanagment\View\Components\MenuItemAdd;
use Menu\Menumanagment\View\Components\MenuItemEdit;
use Menu\Menumanagment\View\Components\MenuItemList;
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

        $this->app['router']->namespace('Menu\Menumanagment\Http\Controllers\Backend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
                });

         $this->app['router']->namespace('Menu\Menumanagment\Http\Controllers\Frontend')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/routes/menupage.php');
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
            MenuHeader::class
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