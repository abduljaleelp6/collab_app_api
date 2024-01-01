<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('product_identifier', 20)->unique();
            $table->string('BID');
            $table->foreign('BID')
                ->references('BID')
                ->on('business');
            $table->string('hs_code');
            $table->string('arabic_name')->default('null');
            $table->string('english_name');
            $table->bigInteger('product_category_id');
            $table->foreign('product_category_id')
                ->references('category_identifier')
                ->on('categories');
            $table->bigInteger('product_sub_category_id');
            $table->foreign('product_sub_category_id')
                ->references('category_id')
                ->on('sub_categories');
            $table->text('product_description');
            $table->string('product_main_image');
            $table->string('product_price');
            $table->string('product_status');
            $table->dateTime('product_creation_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
