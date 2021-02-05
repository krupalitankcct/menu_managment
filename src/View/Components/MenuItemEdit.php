<?php

namespace menus\menumanagement\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class MenuItemEdit extends Component
{
    public $menuItemPageEdit;
    public $menuTypes;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menuItemPageEdit = null,$menuTypes = null)
    {
        $this->menuItemPageEdit = $menuItemPageEdit;
        $this->menuTypes = $menuTypes;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       return view('menu::components.item.menu_item_edit');
    }
}
