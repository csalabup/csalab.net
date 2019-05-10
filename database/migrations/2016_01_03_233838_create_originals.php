<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('originals', function(Blueprint $table) {
            $table->increments('id');
            $table->biginteger('user_id');
            $table->text('original_url');
            $table->text('medium_url');
            $table->text('small_url');
            $table->text('thumb_url');
            $table->text('thumb_key');

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
        Schema::drop('originals');
    }
}
