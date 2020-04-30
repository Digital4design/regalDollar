<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_name')->nullable();
            $table->string('slogan')->nullable();
            $table->string('description')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->integer('price')->unsigned();
            $table->integer('duration')->unsigned();
            $table->string('time_investment')->nullable();
            $table->string('plan_valid_from')->nullable();
            $table->enum('plan_type', ['0', '1','2','3'])->default('0')->comment = '0 = No Plan , 1 = Core plan , 2 = Investment plan 3= unassign docs';
            $table->text('descritpion')->nullable();
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
        Schema::dropIfExists('plans');
    }
}
