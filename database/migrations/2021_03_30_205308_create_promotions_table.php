<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
          
            $table->enum('promotion_type',['percent','fixed_amount'])->default('percent'); 

            $table->dateTime('start_date');
            $table->dateTime('ending_date');

            $table->decimal('discount_rate')->nullable();
            $table->float('fixed_amount_discount')->nullable();

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
        Schema::dropIfExists('promotions');
    }
}
