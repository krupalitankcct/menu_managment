<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('menu_title');
            $table->bigInteger('menu_id')->unsigned();
            $table->enum('menu_types', ['custom', 'cms']);
            $table->string('menu_url')->nullable();
            $table->bigInteger('cms_id')->unsigned()->nullable();
            $table->integer('order');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('cms_id')->references('id')->on('cms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
