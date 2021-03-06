<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->string('ip_address')->nullable();
            $table->string('name', 50);
            $table->string('email', 100)->nullable();
            $table->string('mobile', 15);
            $table->string('shipping_address');
            $table->text('message')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_complete')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            $table->integer('shipping_charge')->nullable();
            $table->integer('customer_discount')->nullable();
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
