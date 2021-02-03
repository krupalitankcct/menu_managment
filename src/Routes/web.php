<?php 


Route::group(['prefix' => '', 'as' => 'menu.'], function () {
    Route::get('/admin/menu_list', 'MenuController@menuIndex')->name('menu_list');
    Route::post('/admin/menu_list', 'MenuController@menuIndex')->name('menu_list');
    Route::get('/admin/menu/create', 'MenuController@createMenu')->name('create');
    Route::post('/admin/menu/store', 'MenuController@storeMenu')->name('store');
    Route::get('/admin/menu/edit/{id}', 'MenuController@editMenu')->name('edit');
    Route::post('/admin/menu/update/{id}', 'MenuController@updateMenu')->name('update');
    Route::get('/admin/menu/delete/{id}', 'MenuController@destroyMenu')->name('delete');

    Route::get('/admin/menu/menuActive/{id}', 'MenuController@menuActive')->name('menuActive');
    Route::get('/admin/menu/menuInactive/{id}','MenuController@menuInactive')->name('menuInactive');
    Route::get('/admin/menu/item/index/{id}', 'MenuController@menuItemIndex')->name('item.index');
    Route::post('/admin/menu/item/index/{id}', 'MenuController@menuItemIndex')->name('item.index');
    Route::get('/admin/menu/item/create/{id}', 'MenuController@createMenuItem')->name('item.create');
    Route::post('/admin/menu/item/store', 'MenuController@storeMenuItem')->name('item.store');
    Route::get('/admin/menu/item/edit/{id}', 'MenuController@editMenuItem')->name('item.edit');
    Route::post('/admin/menu/item/update/{id}','MenuController@updateMenuItem')->name('item.update');
    Route::get('/admin/menu/item/delete/{id}', 'MenuController@destroyMenuItem')->name('item.delete');

    Route::get('/admin/menu/active/{id}', 'MenuController@activeMenuItem')->name('active');
    Route::get('/admin/menu/inactive/{id}','MenuController@inactiveMenuItem')->name('inactive');
	
});




