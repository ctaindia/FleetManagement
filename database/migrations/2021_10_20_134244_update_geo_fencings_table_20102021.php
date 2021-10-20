<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGeoFencingsTable20102021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('geo_fencings', function (Blueprint $table) {
            $table->float('radius', 8,2)->after('bounding');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('geo_fencings', function (Blueprint $table) {
            $table->dropColumn(['radius']);
        });
    }
}
