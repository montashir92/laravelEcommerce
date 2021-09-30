<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->double('price');
            $table->string('product_key', 40);
            $table->integer('quantity')->default(1);
            $table->tinyInteger('available')->default(1)->comment('1=In Stock, 0=Out of Stock');
            $table->tinyInteger('condition')->default(1)->comment('1=New, 0=Old');
            $table->tinyInteger('status')->default(0);
            $table->double('offer_price')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('products');
    }
}
