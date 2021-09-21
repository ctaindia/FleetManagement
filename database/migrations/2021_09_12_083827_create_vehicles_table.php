<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->longText('vehicle_image');
            $table->string('maker_name');
            $table->string('engine_model');
            $table->string('vehicle_model');
            $table->string('vehicle_hp');
            $table->integer('vehicle_type_id');
            $table->string('mielege');
            $table->string('liscence_no');
            $table->tinyInteger('status')->comment('1: active, 0: in active')->default(1);
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
