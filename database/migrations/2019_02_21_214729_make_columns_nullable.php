<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->mediumText('text')->nullable()->change();
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->string('text')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
            $table->mediumText('text')->nullable(false)->change();
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->string('text')->nullable(false)->change();
            
        });
    }
}
