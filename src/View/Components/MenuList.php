<?php

namespace menus\menumanagement\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class MenuList extends Component
{
    public $menus;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menus = null)
    {
        $this->menus = $menus;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(config::get('menu.use_published_view')){

            return view('menu.components.menu_list');
        }else{
            return view('menu::components.menu_list');
        }
    }
}
