<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('user_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('url_link')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->biginteger('picture_id')->nullable();
            $table->boolean('show_on_home_page')->nullable();
            $table->boolean('published')->nullable();            
            $table->boolean('include_in_top_menu')->nullable();
            $table->integer('display_order')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
