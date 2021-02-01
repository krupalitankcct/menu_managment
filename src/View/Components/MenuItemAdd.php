<?php

namespace Menu\Menumanagment\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class MenuItemAdd extends Component
{
    public $cms;
    public $menus;
    public $menuTypes;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cms = null,$menus = null,$menuTypes = null)
    {
        $this->cms = $cms;
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
