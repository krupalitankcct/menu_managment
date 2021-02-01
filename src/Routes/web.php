<?php 


Route::group(['prefix' => '', 'as' => 'menu.'], function () {
    Route::get('menu_list', 'MenuController@menuIndex')->name('menu_list');
    Route::post('menu_list', 'MenuController@menuIndex')->name('menu_list');
    Route::get('menu/create', 'MenuController@createMenu')->name('create');
    Route::post('menu/store', 'MenuController@storeMenu')->name('store');
    Route::get('menu/edit/{id}', 'MenuController@editMenu')->name('edit');
    Route::post('menu/update/{id}', 'MenuController@updateMenu')->name('update');
    Route::get('menu/delete/{id}', 'MenuController@destroyMenu')->name('delete');
    Route::get('menu/item/index/{id}', 'MenuController@menuItemIndex')->name('item.index');
    Route::post('menu/item/index/{id}', 'MenuController@menuItemIndex')->name('item.index');
    Route::get('menu/item/create/{id}', 'MenuController@createMenuItem')->name('item.create');
    Route::post('menu/item/store', 'MenuController@storeMenuItem')->name('item.store');
    Route::get('menu/item/edit/{id}', 'MenuController@editMenuItem')->name('item.edit');
    Route::post('menu/item/update/{id}','MenuController@updateMenuItem')->name('item.update');
    Route::get('menu/item/delete/{id}', 'MenuController@destroyMenuItem')->name('item.delete');
	
});




