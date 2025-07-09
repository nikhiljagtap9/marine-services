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
        Schema::table('payments', function (Blueprint $table) {
            $table->text('callback_url')->change(); // from string to text
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('callback_url', 255)->change(); // rollback if needed
        });
    }
};
