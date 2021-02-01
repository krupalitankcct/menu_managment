<?php

namespace Menu\Menumanagment\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class MenuItemEdit extends Component
{
    public $cms;
    public $menuItemPageEdit;
    public $menuTypes;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cms = null,$menuItemPageEdit = null,$menuTypes = null)
    {
        $this->cms = $cms;
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
