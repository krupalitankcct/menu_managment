<?php

namespace Menu\Menumanagment\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

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
       return view('menu::components.menu_add');
    }
}