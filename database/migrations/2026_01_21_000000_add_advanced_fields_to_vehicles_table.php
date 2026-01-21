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
        Schema::table('vehicles', function (Blueprint $table) {
            // Basic extended information
            $table->string('code')->nullable()->after('id'); // Code véhicule
            $table->string('category')->nullable()->after('model'); // Catégorie
            $table->string('color')->nullable()->after('category'); // Couleur
            $table->string('fuel_type')->nullable()->after('color'); // Type carburant
            $table->unsignedInteger('power')->nullable()->after('fuel_type'); // Puissance

            // Usage / rental information
            $table->string('usage_status')->nullable()->after('status'); // ex: Location
            $table->decimal('rental_amount', 12, 2)->nullable()->after('usage_status'); // Montant (Traite/Location)
            $table->boolean('assigned')->default(false)->after('rental_amount'); // Affectation (Oui / Non)
            $table->unsignedInteger('next_service_km')->nullable()->after('assigned'); // Km prochain vidange
            $table->text('extra_info')->nullable()->after('description'); // Info supplémentaires

            // Assurance
            $table->date('insurance_start_date')->nullable();
            $table->date('insurance_end_date')->nullable();
            $table->decimal('insurance_amount', 12, 2)->nullable();
            $table->string('insurance_company')->nullable();
            $table->unsignedInteger('insurance_validity_days')->nullable();
            $table->decimal('insurance_daily_charge', 12, 2)->nullable();

            // Visite technique
            $table->date('technical_start_date')->nullable();
            $table->date('technical_end_date')->nullable();
            $table->decimal('technical_amount', 12, 2)->nullable();
            $table->unsignedInteger('technical_validity_days')->nullable();
            $table->decimal('technical_daily_charge', 12, 2)->nullable();

            // Vignette
            $table->date('vignette_start_date')->nullable();
            $table->date('vignette_end_date')->nullable();
            $table->decimal('vignette_amount', 12, 2)->nullable();
            $table->unsignedInteger('vignette_validity_days')->nullable();
            $table->decimal('vignette_daily_charge', 12, 2)->nullable();

            // Carte grise
            $table->date('carte_grise_start_date')->nullable();
            $table->date('carte_grise_end_date')->nullable();
            $table->decimal('carte_grise_amount', 12, 2)->nullable();
            $table->unsignedInteger('carte_grise_validity_days')->nullable();
            $table->decimal('carte_grise_daily_charge', 12, 2)->nullable();

            // Autorisation
            $table->date('autorisation_start_date')->nullable();
            $table->date('autorisation_end_date')->nullable();
            $table->decimal('autorisation_amount', 12, 2)->nullable();
            $table->unsignedInteger('autorisation_validity_days')->nullable();
            $table->decimal('autorisation_daily_charge', 12, 2)->nullable();

            // Mouchards
            $table->date('mouchard_start_date')->nullable();
            $table->date('mouchard_end_date')->nullable();
            $table->decimal('mouchard_amount', 12, 2)->nullable();
            $table->unsignedInteger('mouchard_validity_days')->nullable();
            $table->decimal('mouchard_daily_charge', 12, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn([
                'code',
                'category',
                'color',
                'fuel_type',
                'power',
                'usage_status',
                'rental_amount',
                'assigned',
                'next_service_km',
                'extra_info',
                'insurance_start_date',
                'insurance_end_date',
                'insurance_amount',
                'insurance_company',
                'insurance_validity_days',
                'insurance_daily_charge',
                'technical_start_date',
                'technical_end_date',
                'technical_amount',
                'technical_validity_days',
                'technical_daily_charge',
                'vignette_start_date',
                'vignette_end_date',
                'vignette_amount',
                'vignette_validity_days',
                'vignette_daily_charge',
                'carte_grise_start_date',
                'carte_grise_end_date',
                'carte_grise_amount',
                'carte_grise_validity_days',
                'carte_grise_daily_charge',
                'autorisation_start_date',
                'autorisation_end_date',
                'autorisation_amount',
                'autorisation_validity_days',
                'autorisation_daily_charge',
                'mouchard_start_date',
                'mouchard_end_date',
                'mouchard_amount',
                'mouchard_validity_days',
                'mouchard_daily_charge',
            ]);
        });
    }
};

