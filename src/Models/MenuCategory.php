<?php

namespace menus\menumanagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
   
    public $table = 'menu_categories';

    use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
