<?php
namespace menus\menumanagement\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use cms\cmspackage\Models\Cms;
use menus\menumanagement\Models\Menu;
use menus\menumanagement\Models\MenuCategory;
use menus\menumanagement\Models\MenuItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Redirect;

/**
 * Menu Controller
 */
class MenuController extends Controller {

    protected $menu;
    protected $cms;
    protected $menuCategory;
    protected $menuItem;
    /**
     * 
     * @param Menu $menu
     */
    public function __construct(Menu $menu, Cms $cms,MenuCategory $menuCategory,MenuItem $menuItem ) {
        $this->menu = $menu;
        $this->cms = $cms;
        $this->menuCategory = $menuCategory;
        $this->menuItem = $menuItem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menuIndex(Request $request) {
        try{
        // get menu category 
        $menus = $this->menu->with('menuCategory')->get();
        // get total records
        $total_records = count($menus);
        // pagination
        //$menus = $menus->paginate(Config::get('menu.per_page.max_record'));

        return view('menu::list', compact('menus', 'total_records'));
        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }
    
    /**
     * create method For Menu Item
     * @return type
     */
    public function createMenu() {
        try{

        $menuCategories = $this->menuCategory->select('name','id')->pluck('name','id'); 
        return view('menu::add', compact('menuCategories'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }
    
     /**
     * Store Menu Data in menus table
     * @param Request $request
     * @return type
     */
    public function storeMenu(Request $request) {
        try{
        //create validation array
        $validator = Validator::make($request->all(),[
            'menu_category_id' =>'required|unique:menus,deleted_at,NULL',
            'title' => 'required',
        ]);

        //check validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        //validate data store in menu item table
         $cms = Menu::create([
                'menu_category_id' => $request->menu_category_id,
                'title' => $request->title
              ]);

        return redirect()->route('menu.menu_list')->withFlashSuccess(__('package_lang::validation.custom.menu_create'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }
    /**
     *  Show the form for editing the specified resource.
     * @param type $id
     * @return type
     */
    public function editMenu($id) {
        try{
        // get menu details base 
        $menuPageEdit = $this->menu->findOrFail($id);
        $menuCategories = $this->menuCategory->select('name','id')->pluck('name','id'); 

        return view('menu::edit', compact('menuPageEdit','menuCategories'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateMenu(Request $request, $id) {
        try{
        //create validation array
        
        $validator = Validator::make($request->all(),[
            'menu_category_id' =>'required|unique:menus,menu_category_id,'.$id.',id,deleted_at,NULL',
            'title' => 'required',
            'status' => 'required',
        ]);

        //check validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        // update data in menu 
        $menuUpdate = $this->menu->findOrFail($id);
        $menuUpdate->menu_category_id = $request->menu_category_id;
        $menuUpdate->title = $request->title;
        $menuUpdate->status = $request->status;
        $menuUpdate->save();

        return redirect()->route('menu.menu_list')->withFlashSuccess(__('package_lang::validation.custom.menu_edit'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMenu(Request $request, $id) {
        try{
        // get count menu item for this menu
        $menuItems = $this->menuItem
                ->where('menu_id', $id)->count();
        // check menu item is null
        if($menuItems>0){
            return redirect()->route('menu.menu_list')->withErrors(__('package_lang::validation.custom.menu_delete'));
        }
        // get menu item details base on id
        $menu = $this->menu->find($id);
        //delete menu 
        $menu->delete();

        return redirect()->route('menu.menu_list')->withFlashSuccess(__('package_lang::validation.custom.menu_delete'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * status Active method for menu 
     * @param type $id
     * @return type
     */
    public function menuActive($id) {
        try{
        // update status Active in menu table
        $menuCategoryUpdate = $this->menu->findOrFail($id);
        $menuCategoryUpdate->status = 'Active';
        $menuCategoryUpdate->save();

        return redirect()->route('menu.menu_list')
                        ->withFlashSuccess(__('package_lang::validation.custom.menu_active'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * Inactive status in menu table
     * @param $id
     * @return mixed
     */
    public function menuInactive($id) {
        try{
        // update status inactive in menu table
        $menuCategoryUpdate = $this->menu->findOrFail($id);
        $menuCategoryUpdate->status = 'Inactive';
        $menuCategoryUpdate->save();

        return redirect()->route('menu.menu_list')
                        ->withFlashSuccess(__('package_lang::validation.custom.menu_inactive'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    //menu item index method
    public function menuItemIndex(Request $request, $id) {
        try{
        // menu get with category 
        $menuItems = $this->menuItem
                ->where('menu_id', $id);
        
        // get total records
        $total_records = count($menuItems->get());
        
        $menuItems = $menuItems->paginate(Config::get('menu.per_page.max_record'));
        
        return view('menu::item.index', compact('menuItems', 'total_records', 'id'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * create method For Menu Item
     * @return type
     */
    public function createMenuItem($id) {
        try{
        // get menu details 
        $menus = $this->menu->select('id')->find($id);
        // get cms page data
        $cms = $this->cms->select('id', 'name')->pluck('name', 'id');
        // get form constant
        $menuTypes = Config::get('menu.menu_types');
        return view('menu::item.create', compact('cms','menus','menuTypes'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * Store Menu Data in menus item table
     * @param Request $request
     * @return type
     */
    public function storeMenuItem(Request $request) {
        try{

        $validator = Validator::make($request->all(),[
            'menu_title' => 'required',
            'menu_id' => 'required',
            'menu_types' => 'required',
            'order' =>'required|unique:menu_items',
        ]);

        //check validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        if ($request->menu_types == "cms") {
            $cms = $this->cms->select('slug')->where('id',$request->cms_id)->first();
            $request['menu_url'] = 'info/'.$cms->slug;
        }
        //validate data store in menu item table
        $cms = MenuItem::create([
                'menu_title' => $request->menu_title,
                'menu_id' => $request->menu_id,
                'menu_types' => $request->menu_types,
                'order' => $request->order,
                'cms_id' => $request->cms_id,
                'menu_url' => $request->menu_url,

              ]);

        return redirect()->route('menu.item.index', $request->menu_id)->withFlashSuccess(__('package_lang::validation.custom.menu_delete'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
                        
    }

    /**
     *  Show the form for editing the specified resource.
     * @param type $id
     * @return type
     */
    public function editMenuItem($id) {
        try{
        // get cms page details  
        $cms = $this->cms->select('id', 'name')->pluck('name', 'id');
        // base on id get menu item dtails
        $menuItemPageEdit = $this->menuItem->findOrFail($id);
        // get form constant
        $menuTypes = Config::get('menu.menu_types');
        
        return view('menu::item.edit', compact('cms','menuItemPageEdit','menuTypes'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateMenuItem(Request $request, $id) {

        try{
        // check validation rules
        $validator = Validator::make($request->all(),[
            'menu_title' => 'required',
            'menu_id' => 'required',
            'menu_types' => 'required',
            'order' =>'required',
        ]);

        //check validation
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        if ($request->menu_types == "cms") {
                $cms = $this->cms->select('slug')->where('id',$request->cms_id)->first();
                $request['menu_url'] = 'info/'.$cms->slug;
        } else {
                $request['cms_id'] = NULL;
        }
        // update menu details
        $menuUpdate = $this->menuItem->findOrFail($id);
        $menuUpdate->update($request->all());

        return redirect()->route('menu.item.index', $request->menu_id)->withFlashSuccess(__('package_lang::validation.custom.menu_item_edit'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * status Active method for menu item
     * @param type $id
     * @return type
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMenuItem(Request $request, $id) {
        try{
        // get menu item details base on id
        $menuItem = $this->menuItem->find($id);
        // get menu it id
        $menuId = $menuItem->menu_id;
        //delete menu item
        $menuItem->delete();
        // redirect
        return redirect()->route('menu.item.index', $menuId)->withFlashSuccess(__('package_lang::validation.custom.menu_item_delete'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }
    }

    /**
     * status Active method for menu item
     * @param type $id
     * @return type
     */
    public function activeMenuItem($id) {
        try{
        // update status ative in menu item table
        $menuUpdate = $this->menuItem->findOrFail($id);
        $menuUpdate->status = 'Active';
        $menuUpdate->save();

        return redirect()->route('menu.item.index', $menuUpdate->menu_id)->withFlashSuccess(__('package_lang::validation.custom.menu_item_active'));

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }

    }

    /**
     * Inactive menu item
     * @param $id
     * @return mixed
     */
    public function inactiveMenuItem($id) {
        try{
        // update status inactive menu item table
        $menuUpdate = $this->menuItem->findOrFail($id);
        $menuUpdate->status = 'Inactive';
        $menuUpdate->save();

       return redirect()->route('menu.item.index', $menuUpdate->menu_id)->withFlashSuccess(__('package_lang::validation.custom.menu_iem_inactive'));
       
       }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return view('menu::error.505')->withFlashDanger($ex->getMessage());
        }

    }

    
    
    

}
