<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToCommonTables extends Migration
{
    public function up()
    {
        
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('ports', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        
        Schema::table('cities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('ports', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}

