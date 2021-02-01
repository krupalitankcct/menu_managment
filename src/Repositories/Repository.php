<?php 
namespace Menu\Menumanagment\Repositories;
use Menu\Menumanagment\Models\MenuItem;

class Repository 
{
    
    public function getMenulist($category) {
    // Get all instances of model
    $menuArray = [];

        // get menu details 
        $menus = MenuItem::join('menus', 'menus.id', '=', 'menu_items.menu_id')
                ->join('menu_categories', 'menu_categories.id', '=', 'menus.menu_category_id')
                ->with('cms')
                ->where(['menu_categories.name' => $category, 'menu_items.status' => 'Active'])
                ->orderBy('menu_items.order','ASC')
                ->get();

        $menuArray['menuLabel'] = '';
        foreach ($menus as $menu) {
            $menuUrl = null;
            $menuArray['menuLabel'] = $menu->title;
            //check menu url is custom or cms
            if ($menu->menu_url != null) {
                $menuUrl = $menu->menu_url;
            } else if (isset($menu->cms->slug) && $menu->cms->slug != null) {
                $menuUrl = $menu->cms->slug;
            }
            // create array for menu
            $menuArray['menuItems'][] = Array(
                'menuItemTitle' => $menu->menu_title,
                'menuItemUrl' => $menuUrl,
            );
        }

        return $menuArray;
    }

}