<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('model');
            $table->integer('year');
            $table->integer('passenger_count');
            $table->string('manufacturer');
            $table->decimal('price', 10, 2);
            $table->string('fuel_type')->nullable();
            $table->integer('trunk_space')->nullable();
            $table->integer('wheel_count')->nullable();
            $table->integer('cargo_area_size')->nullable();
            $table->integer('trunk_size')->nullable();
            $table->integer('fuel_capacity')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
