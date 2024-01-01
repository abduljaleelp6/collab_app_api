<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table) 
		{
            $table->bigInteger('ad_id')->unique();
            $table->string('BID');
			$table->foreign('BID')->references('BID')->on('business');
            $table->string('ad_title');
            $table->string('ad_text');
			$table->bigInteger('ad_type', 20);
            $table->string('ad_image',300);
            $table->string('ad_status',300);
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
        Schema::dropIfExists('advertisement');
    }
}
