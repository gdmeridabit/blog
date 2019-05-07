<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username',20);
            $table->string('password');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('description',161)->nullable();
            $table->string('display_picture',255)->nullable();
            $table->string('url',255)->nullable();
            $table->string('email',255);
            $table->boolean('is_admin');
            $table->boolean('is_enabled');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->string('remember_token', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
