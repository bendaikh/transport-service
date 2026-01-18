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
            $table->id();
            $table->string('registration')->unique(); // Immatriculation
            $table->string('brand'); // Marque
            $table->string('model'); // Modèle
            $table->integer('capacity'); // Capacité
            $table->date('service_date'); // Date mise en service
            $table->enum('status', ['active', 'inactive', 'maintenance', 'rented'])->default('active'); // État
            $table->string('type'); // Bus, Van, etc.
            $table->text('description')->nullable();
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
