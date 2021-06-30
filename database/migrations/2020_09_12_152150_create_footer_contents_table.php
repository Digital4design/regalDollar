<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('footer_email')->nullable();
            $table->string('footer_address')->nullable();
            $table->string('footer_copy_right')->nullable();
            $table->longText('footer_content')->nullable();
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
        Schema::dropIfExists('footer_contents');
    }
}
