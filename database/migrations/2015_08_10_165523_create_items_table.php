<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('user_id');
            $table->string('name');
            $table->text('description');
            $table->boolean('show_on_home_page')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->boolean('published')->nullable();
            $table->string('sku')->nullable();
            $table->string('manufacturer_part_number')->nullable();
            $table->string('gtin')->nullable();    
            $table->integer('stock_quantity')->nullable();
            $table->boolean('has_image')->nullable();
            $table->Integer('order_minimum_quantity')->nullable();
            $table->Integer('order_maximum_quantity')->nullable();

            $table->boolean('disable_buy_button')->nullable();
            $table->decimal('price', 18, 4)->nullable();
            $table->decimal('old_price', 18, 4)->nullable();

            $table->decimal('weight', 18, 4)->nullable();;
            $table->decimal('length', 18, 4)->nullable();
            $table->decimal('width', 18, 4)->nullable();
            $table->decimal('height', 18, 4)->nullable();     
            $table->Integer('display_order')->nullable();                     
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
        Schema::drop('items');
    }
}
