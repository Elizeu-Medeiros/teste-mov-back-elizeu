<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->decimal('km', 8, 3)->default(0.00);
            $table->string('fuel', 25)->nullable();
            $table->string('exchange', 10)->nullable();
            $table->string('doors', 20)->nullable();
            $table->boolean('air_conditioning')->default("0");
            $table->boolean('airbag')->default("0");
            $table->boolean('brake_abs')->default("0");
            $table->string('information', 150);
            $table->integer('end_plate')->default("0");
            $table->string('color', 25)->nullable();
            $table->string('deadline', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('store_withdrawn', 50)->nullable();
            $table->string('plan', 100)->nullable();
            $table->string('franchising', 50)->nullable();
            $table->decimal('price', 8, 2)->default("0");
            $table->string('description');
            $table->string('image');
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
        Schema::dropIfExists('cars');
    }
};
