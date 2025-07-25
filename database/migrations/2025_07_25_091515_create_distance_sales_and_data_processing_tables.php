<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('distance_sales_agreements', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('content');
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('data_processing_policies', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('content');
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distance_sales_agreements');
        Schema::dropIfExists('data_processing_policies');
    }
};

