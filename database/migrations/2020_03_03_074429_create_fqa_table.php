<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFqaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fqa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fqaHeadding')->nullable();
            $table->longText('fqaAnswer')->nullable();
            $table->enum('fqa_type', ['general', 'members','login','about'])->default('general')->comment = 'fqa_type';
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
        Schema::dropIfExists('fqa');
    }
}
