<?php

namespace menus\menumanagement\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class MenuItemAdd extends Component
{
    public $menus;
    public $menuTypes;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menus = null,$menuTypes = null)
    {
        
        $this->menus = $menus;
        $this->menuTypes = $menuTypes;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(config::get('menu.use_published_view')){
            return view('menu.components.item.menu_item_add');
        }else{
          return view('menu::item.create');
        } 
    }
}
