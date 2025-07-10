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
            $table->string('contact_person_last_name', 255)->after('contact_person_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_provider_details', function (Blueprint $table) {
            $table->dropColumn('contact_person_last_name');
        });
    }
};
