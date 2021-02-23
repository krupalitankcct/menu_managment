<?php

namespace Menus\Menumanagement\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class MenuItemList extends Component
{
    public $menuItems;
    public $total_records;
    public $id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menuItems = null,$total_records = null,$id = null)
    {
        $this->menuItems = $menuItems;
        $this->total_records = $total_records;
        $this->id = $id;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('menu::components.item.menu_item_list');
    }
}
