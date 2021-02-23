<?php

namespace Menus\Menumanagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    public $table = 'menu_items';

    use SoftDeletes;

    protected $fillable = [
        'menu_title',
        'menu_id',
        'menu_types',
        'cms_id',
        'category_id',
        'menu_url',
        'order',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * relation to cms 
     * @return type
     */
    
}
