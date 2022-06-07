<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('com_name')->nullable();
            $table->string('occupation')->nullable();
            $table->string('username')->nullable();
            $table->string('username_sm')->nullable();
            $table->string('p_code')->nullable();
            $table->string('adress')->nullable();
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('url')->nullable();
            $table->string('tw')->nullable();
            $table->string('fb')->nullable();
            $table->string('in')->nullable();
            $table->string('yt')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
