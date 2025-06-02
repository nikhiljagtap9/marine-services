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
        Schema::table('service_provider_details', function (Blueprint $table) {
        $table->decimal('lat', 10, 7)->nullable()->after('office_address');   // adjust position as needed
        $table->decimal('lng', 10, 7)->nullable()->after('lat');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_provider_details', function (Blueprint $table) {
        $table->dropColumn(['lat', 'lng']);
        });
    }
};
