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
        Schema::create('service_provider_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Basic Company Info
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->text('company_description')->nullable();

            // Contact Info
            $table->string('contact_person_name')->nullable();
            $table->string('phone')->nullable();
        //    $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->text('office_address')->nullable();

            // Services
            $table->string('port_id')->nullable();
            $table->string('service_type')->nullable();
            $table->string('sub_service_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provider_details');
    }
};
