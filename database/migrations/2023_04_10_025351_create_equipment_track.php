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
        Schema::create('equipment_track', function (Blueprint $table) {
            $table->id('control_id');
            $table->string('asset_identification_number');
            $table->string('item_description');
            $table->string('serial_number')->nullable();
            $table->integer('quantity');
            $table->string('remarks')->nullable();
            $table->string('station');
            $table->string('user');
            $table->string('account');
            $table->string('facilitate');
            $table->date('date');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_track');
    }
};
