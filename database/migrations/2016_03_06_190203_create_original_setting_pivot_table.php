<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginalSettingPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('original_setting', function (Blueprint $table) {
            $table->integer('original_id')->unsigned()->index();
            $table->foreign('original_id')->references('id')->on('originals')->onDelete('cascade');
            $table->integer('setting_id')->unsigned()->index();
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
            $table->primary(['original_id', 'setting_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('original_setting');
    }
}
