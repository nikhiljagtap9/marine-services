<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('privacy_policies', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('content');
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->softDeletes(); // for soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_policies');
    }
};
