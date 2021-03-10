<?php
namespace Menus\Menumanagement\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Menus\Menumanagement\Repositories\Repository;
use Illuminate\Http\Request;
use Redirect;

/**
 * Menu Controller
 */
class MenuController extends Controller {

private $Repository;

   public function __construct(Repository $Repository)
   {
       $this->Repository = $Repository;
   }

   public function index()
   {
      try{
         $mainmenu = $this->Repository->getMenulist('Main Menu');
         $footermenu1 = $this->Repository->getMenulist('Footer Menu 1');
         $footermenu2 = $this->Repository->getMenulist('Footer Menu 2');
         $align = 'horizontal-menu';
         return view('menu::components.menu_page', compact('mainmenu', 'footermenu1','footermenu2','align'));
      
      }catch (\Exception $ex) {
         Log::error($ex->getMessage());
         return Redirect::back()->withFlashDanger($ex->getMessage());
      }
   }
 }