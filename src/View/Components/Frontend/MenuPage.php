<?php

namespace menus\menumanagement\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class MenuPage extends Component
{
    public $mainmenu;
    public $footermenu2;
    public $footermenu1;
    public $align;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mainmenu = null,$align = null,$footermenu1 = null,$footermenu2 = null)
    {
        $this->mainmenu = $mainmenu;
        $this->footermenu2 = $footermenu2;
        $this->footermenu1 = $footermenu1;
        $this->align = $align;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       return view('menu::components.menu_page');
    }
}
