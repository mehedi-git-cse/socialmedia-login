<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneNumberToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('dp')->nullable();
            $table->string('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('school')->nullable();
            $table->string('college')->nullable();
            $table->string('university')->nullable();
            $table->string('experience')->nullable();
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
            $table->dropColumn(['google_id','dp','bio', 'location', 'school','college','university','experience']);
        });
    }
}
