<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('surname',255);
            $table->string('country',255);
            $table->string('address',255);
            $table->string('city',255);
            $table->string('region',255);
            $table->string('index',255);
            $table->string('phone',255);
            $table->string('email',255);
            $table->text('details')->nullable(false);
            $table->decimal('amount', 10, 2)->unsigned();
            $table->integer('status')->default(0);


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
        Schema::dropIfExists('orders');
    }
}
