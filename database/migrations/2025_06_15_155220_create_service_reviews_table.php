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
        Schema::create('service_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_provider_id')->constrained('users')->onDelete('cascade');
            $table->string('vessel_company_name');
            $table->string('vessel_company_email');
            $table->foreignId('port_id')->constrained('ports')->onDelete('cascade');
            $table->date('service_date');
            $table->foreignId('service_category_id')->constrained('categories')->onDelete('cascade');
            $table->string('invoice_document')->nullable(); // file path
            $table->text('comment')->nullable();
            $table->unsignedTinyInteger('rating'); // 1 to 5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_reviews');
    }
};
