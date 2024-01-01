<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) 
		{
            $table->bigInteger('p_id')->unique();
            $table->string('BID');
			$table->foreign('BID')->references('BID')->on('business');
            $table->string('post_text');
			$table->bigInteger('post_type', 20);
            $table->string('post_image',300);
            $table->string('post_status',300);
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
        Schema::dropIfExists('posts');
    }
}
