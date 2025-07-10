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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lname');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lname', 255)->after('name'); // Recreate column if rolled back
        });
    }
};
