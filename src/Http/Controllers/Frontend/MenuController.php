<?php
namespace Menu\Menumanagment\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Menu\Menumanagment\Repositories\Repository;
use Illuminate\Http\Request;
use Cms\Cmspackage\Models\Cms;
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
      $mainmenu = $this->Repository->getMenulist('Main Menu');
      $FooterMenu1 = $this->Repository->getMenulist('Footer Menu 1');
      $FooterMenu2 = $this->Repository->getMenulist('Footer Menu 2');
      $align = 'horizontal-menu';
      
      return view('menu::Frontend.menupage', compact('mainmenu', 'FooterMenu1','FooterMenu2','align'));
     
   }
 }