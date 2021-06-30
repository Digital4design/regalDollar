<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_models', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('section', ['Why Regal Dollar', 'Plans','Company','Resources'])->default('Plans')->comment = 'section type';
            $table->string('menu_name')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('footer_models');
    }
}
