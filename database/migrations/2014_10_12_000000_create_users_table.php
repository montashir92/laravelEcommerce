<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('usertype')->nullable();
            $table->string('email')->unique();
            $table->string('role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('code')->nullable();
            $table->string('street_addres')->nullable();
            $table->string('gender')->nullable();
            $table->string('ip_address')->nullable();
            $table->unsignedInteger('division_id')->nullable()->comment('Division Table ID');
            $table->unsignedInteger('district_id')->nullable()->comment('District Table ID');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('shipping_address')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
