<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->string('make');
            $table->string('model');
            $table->char('year', 4);
            $table->boolean('highlighted');
            $table->enum('hours_or_miles', ['Hours', 'Miles'])->nullable();
            $table->integer('purchase_usage')->nullable();
            $table->string('purchase_from')->nullable();
            $table->string('purchase_date')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->char('serial_number', 30)->nullable();
            $table->char('vin_number', 30)->nullable();
            $table->timestamps();

        });    

        Schema::table('equipment', function(Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_table');

    }
}
