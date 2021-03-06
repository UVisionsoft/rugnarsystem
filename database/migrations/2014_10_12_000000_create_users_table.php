<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            /*
             * User Type
             * ==============
             * 0 => admin
             * 1 => trainer
             * 2 => user
             * 3 => doctor
             * 4 => vendor
             * */
            $table->unsignedTinyInteger('type')->default(0);

            $table->string('phone');
            $table->tinyInteger('salary_type')->default(1);
            $table->integer('salary')->default(0);
            $table->integer('credit')->default(0);
            $table->rememberToken();
            $table->timestamps();
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
