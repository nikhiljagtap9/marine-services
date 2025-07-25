<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('terms_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('content');
            $table->enum('status', ['draft', 'published'])->default('draft'); // publish/draft
            $table->softDeletes(); // adds deleted_at column
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terms_conditions');
    }
};


