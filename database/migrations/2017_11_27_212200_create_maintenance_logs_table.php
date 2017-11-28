<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipment_id')->unsigned();
            $table->string('service_description');
            $table->string('serviced_by');
            $table->string('hours_at_service');
            $table->string('service_cost');
            $table->string('service_notes');
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
        Schema::dropIfExists('maintenance_logs');
    }
}
