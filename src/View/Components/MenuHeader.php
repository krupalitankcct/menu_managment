<?php

namespace Menu\Menumanagment\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class MenuHeader extends Component
{
    public $message;
    public $url;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = null, $url = null)
    {
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       return view('menu::components.menu_header');
    }
}
