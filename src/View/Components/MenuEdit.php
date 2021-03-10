<?php

namespace Menus\Menumanagement\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class MenuEdit extends Component
{
    public $menuCategories;
    public $menuPageEdit;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menuPageEdit = null,$menuCategories = null)
    {
        $this->menuPageEdit = $menuPageEdit;
        $this->menuCategories = $menuCategories;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('menu::components.menu_edit');
    }
}
