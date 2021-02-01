<?php

namespace Menu\Menumanagment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Menu extends Model
{
   
    public $table = 'menus';

    use SoftDeletes;

    protected $fillable = [
        'menu_category_id',
        'title',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    
    public function menuCategory() {
        return $this->hasOne('Menu\Menumanagment\Models\MenuCategory','id','menu_category_id');
    }
}
