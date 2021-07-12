<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Invoice::class);
            $table->foreignIdFor(\App\Models\Dog::class);
            /*
             * if (service id => null) then it's a sales item
             * else it's a service only item
             * */
            $table->foreignIdFor(\App\Models\Service::class)->nullable()->default(null);
            $table->integer('amount');
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
        Schema::dropIfExists('invoice_details');
    }
}
