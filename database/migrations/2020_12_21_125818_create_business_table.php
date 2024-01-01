<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        php artisan migrate:refresh --path=/database/migrations/2020_12_21_132653_create_product_table.php
        Schema::create('business', function (Blueprint $table) {
            $table->bigInteger('uni_id', 20);
            $table->string('BID')->unique();
            $table->string('business_email')->unique();
            $table->string('business_main_phone_number')->unique();
            $table->string('business_address')->nullable();
            $table->string('business_lat');
            $table->string('business_lng');
////            $table->engine = “InnoDB”;

            $table->string('business_web_site')->nullable();
            $table->string('business_name')->unique();
            $table->string('business_username')->unique();
            $table->string('business_password', 1024);
            $table->integer('business_account_status')->default(0);
            $table->text('business_bio');
            $table->string('business_logo');
            $table->string('business_cover_image');
            $table->string('business_country');
            $table->string('business_country_code');
            $table->string('business_city')->nullable();
            $table->string('business_main_activity_id')->default(1);

           /* $table->foreign('business_main_activity_id')
                ->references('activity_code')
                ->on('activities');*/

            $table->string('business_sub_activity_id')->default(1);
           /* $table->foreign('business_sub_activity_id')
                ->references('activity_code')
                ->on('sub_activities');*/

            $table->timestamp('business_creation_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->date('business_subscriptions_renew_date')->nullable();
            $table->date('business_exp_date')->nullable();
            //$table->string('business_web_url');
            $table->string('business_facebook_url')->nullable();
            $table->string('business_linkedin_url')->nullable();
            $table->string('business_instagram_url')->nullable();
            $table->string('business_google_map')->nullable();
            $table->string('business_mode')->nullable();
            $table->string('business_sme')->nullable();
            $table->string('business_sme_type')->nullable();
            $table->string('fcm_token')->nullable();

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
        Schema::dropIfExists('business');
    }
}
