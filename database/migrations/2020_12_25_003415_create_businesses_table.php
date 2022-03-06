<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->string('logo');
            $table->string('email');
            $table->string('address');
            $table->string('ruc');
            $table->string('phone');

            $table->string('contact_text');
            $table->string('hours_of_operation');
            $table->string('latitude');
            $table->string('length');
            $table->string('google_maps_link');

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
        Schema::dropIfExists('businesses');
    }
}
