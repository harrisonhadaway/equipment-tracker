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
            $table->string('purchase_miles');
            $table->string('purchase_hours');
            $table->string('purchase_from');
            $table->string('purchase_date');
            $table->string('purchase_price');
            $table->string('serial_number');
            $table->string('vin_number');
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
