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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('method');
            $table->string('path');
            $table->string('ip');
            $table->string('agent');
            $table->integer('status_code');
            $table->text('request');
            $table->enum('gender', ['male', 'female', 'unspecified']);
            $table->integer('nProfiles')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
