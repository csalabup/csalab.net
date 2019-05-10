<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('user_id');

            $table->decimal('tax', 18, 4)->nullable();
            $table->decimal('shipping', 18, 4)->nullable();
            
            $table->string('business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->string('business_address2')->nullable();
            $table->string('business_city')->nullable();
            $table->string('business_state')->nullable();
            $table->string('business_zip_code')->nullable();
            $table->string('business_website')->nullable();
            $table->string('business_phone')->nullable();

            $table->string('business_facebook_page')->nullable();
            $table->string('business_twitter_page')->nullable();

            $table->string('open_monday')->nullable();
            $table->string('close_monday')->nullable();

            $table->string('open_tuesday')->nullable();
            $table->string('close_tuesday')->nullable();

            $table->string('open_wednesday')->nullable();
            $table->string('close_wednesday')->nullable();

            $table->string('open_thursday')->nullable();
            $table->string('close_thursday')->nullable();

            $table->string('open_friday')->nullable();
            $table->string('close_friday')->nullable();

            $table->string('open_saturday')->nullable();
            $table->string('close_saturday')->nullable();

            $table->string('open_sunday')->nullable();
            $table->string('close_sunday')->nullable();
            
            $table->string('shop_name', 60)->unique();
            $table->text('business_about')->nullable();
            $table->string('stripe_secret_key')->nullable();
            $table->string('stripe_public_key')->nullable();
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
        Schema::drop('settings');
    }
}
