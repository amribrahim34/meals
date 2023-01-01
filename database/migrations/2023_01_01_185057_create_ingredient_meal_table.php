<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_meal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_id')->nullable();
            $table->foreign('meal_id')
                ->references('id')
                ->on('meals');
            $table->unsignedBigInteger('ingredient_id')->nullable();
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients');
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
        Schema::dropIfExists('ingredient_meal');
    }
};
