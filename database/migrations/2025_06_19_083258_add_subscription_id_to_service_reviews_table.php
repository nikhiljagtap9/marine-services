<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('service_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('subscription_id')->nullable()->after('service_provider_id');
        });
    }

    public function down(): void
    {
        Schema::table('service_reviews', function (Blueprint $table) {
            $table->dropForeign(['subscription_id']);
            $table->dropColumn('subscription_id');
        });
    }
};
