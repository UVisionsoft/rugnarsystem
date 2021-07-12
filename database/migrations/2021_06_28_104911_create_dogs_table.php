<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('media/avatars/dog-placeholder.png');
            $table->integer('age');
            $table->string('registration_num')->default('');
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            /*
             * owned By
             * 0 => Farm
             * 1 => Farm and Born at farm
             * 2 => customer
             * */
            $table->tinyInteger('owned_by')->default(0);

            /*
             * Status
             * 0 => died
             * 1 => alive
             * 2 => sold
             * */
            $table->tinyInteger('status')->default(1);

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
        Schema::dropIfExists('dogs');
    }
}
