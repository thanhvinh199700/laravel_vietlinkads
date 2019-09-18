<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category');
            $table->unsignedInteger('brand_id');
            $table->string('product_name');
            $table->string('image');
            $table->longtext('product_detail');
            $table->smallInteger('sale');
            $table->integer('quantity');
            $table->unsignedinteger('price');
            $table->unsignedinteger('saleprice');
            $table->smallInteger('trash');
            $table->smallInteger('status');
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
        Schema::dropIfExists('product');
    }
}
