<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dog_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Dog::class)->constrained()->cascadeOnDelete();
            $table->string('action')->index();
            $table->json('payload')->nullable()->default(null);
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
        Schema::dropIfExists('dog_histories');
    }
}
