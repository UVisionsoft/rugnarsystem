<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitySessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_activity_id');
            $table->foreign('dog_activity_id')->references('id')->on('dog_activities')->onDelete('cascade');
            $table->unsignedBigInteger('trainer_id')->nullable()->default(null);
            $table->foreign('trainer_id')->references('id')->on('users')->nullOnDelete();
            $table->integer('duration');
            $table->boolean('status');
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
        Schema::dropIfExists('activity_sessions');
    }
}
