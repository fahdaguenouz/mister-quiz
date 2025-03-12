<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('xp')->default(0);
            $table->string('art')->default('0/0');
            $table->string('geography')->default('0/0');
            $table->string('history')->default('0/0');
            $table->string('science')->default('0/0');
            $table->string('sports')->default('0/0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('xp');
            $table->dropColumn('art');
            $table->dropColumn('geography');
            $table->dropColumn('history');
            $table->dropColumn('science');
            $table->dropColumn('sports');
        });
    }
}
