<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Database\Migrations\Migration;

class CreateCountryStateCityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {

            $table->increments('country_id');
            $table->string('country_name');
            $table->timestamps();
        });
        Schema::create('states', function (Blueprint $table) {

            $table->increments('state_id');
            $table->integer('country_id');
            $table->string('state_name');
            $table->timestamps();
        });
        Schema::create('cities', function (Blueprint $table) {

            $table->increments('city_id');
            $table->integer('state_id');
            $table->string('city_name');
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
        Schema::dropIfExists('country_state_city_tables');
    }
}
