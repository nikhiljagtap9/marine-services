<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
         Schema::create('port_service_details', function (Blueprint $table) {
            $table->id();

            // User who submitted the service
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Country and Port references (can be foreign keys if tables exist)
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('port_id')->nullable();

            // Service Category (foreign key to service_categories table)
            $table->unsignedBigInteger('category_id')->nullable();

            // Subservices as JSON array
            $table->json('sub_services')->nullable();

            // Additional info for that service category
            $table->text('additional_info')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
