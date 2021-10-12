<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDriversTable08102021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_details', function (Blueprint $table) {
            $table->string('fb_profile')->after('driving_license');
            $table->string('ig_profile')->after('fb_profile');
            $table->string('twitter_profile')->after('ig_profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('driver_details', function (Blueprint $table) {
            $table->dropColumn(['fb_profile', 'ig_profile', 'twitter_profile']);
        });
    }
}
