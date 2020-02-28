<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gender');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('City')->nullable();
            $table->string('image')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('Address_type')->nullable();
            $table->string('country_code')->nullable();
            $table->string('Shipping_City')->nullable();
            $table->string('Address_line_01')->nullable();
            $table->string('Address_line_02')->nullable();
            $table->string('Shipping_country')->nullable();
            $table->boolean('isShipping_address')->nullable();
            $table->string('Shipping_postal_code')->nullable();
            $table->string('Shipping_Address_type')->nullable();
            $table->string('Shipping_Address_line_01')->nullable();
            $table->string('Shipping_Address_line_02')->nullable();
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
        Schema::dropIfExists('profile');
    }
}
