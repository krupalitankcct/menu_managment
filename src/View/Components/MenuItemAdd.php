<?php

namespace Menus\Menumanagement\View\Components;
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
        return view('menu::components.item.menu_item_add'); 
    }
}
