<?php

namespace menus\menumanagement\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class MenuAdd extends Component
{
    public $menuCategories;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menuCategories = null)
    {
        $this->menuCategories = $menuCategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(config::get('menu.use_published_view') == "true"){
            return view('menu.components.menu_add');
        }else{
          return view('menu::components.menu_add');
        }
    }
}
