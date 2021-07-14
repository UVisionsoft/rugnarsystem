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

            $table->foreignIdFor(\App\Models\User::class)->nullable()->default(null)->constrained()->restrictOnDelete();

            $table->foreignIdFor(\App\Models\Faction::class)->constrained()->restrictOnDelete();
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
            $table->boolean('is_active')->default(1);
            $table->enum('gender',['male','female']);
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
