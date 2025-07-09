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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_id')->nullable();
            $table->string('status')->nullable();
            $table->decimal('paid_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_association')->nullable();
            $table->string('card_family')->nullable();
            $table->string('bin_number')->nullable();
            $table->string('last_four_digits')->nullable();
            $table->string('payment_token')->nullable();
            $table->string('callback_url')->nullable();
            $table->string('auth_code')->nullable();
            $table->text('raw_response')->nullable();
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
