<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthenticationDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authentication_docs', function (Blueprint $table) {
            $table->id();
            $table->string('BID');
            $table->foreign('BID')->references('BID')->on('business');
            $table->bigInteger('business_uni_id')->unique();

            $table->string('image_url', 300);
            $table->string('image2_url', 300);
            $table->date('expiry_date');
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
        Schema::dropIfExists('authentication_docs');
    }
}
