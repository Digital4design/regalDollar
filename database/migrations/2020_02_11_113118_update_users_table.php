<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('address')->nullable();
            $table->string('plan_start_date')->nullable();
            $table->string('plan_end_date')->nullable();
            $table->text('address2')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('addressLine1')->nullable();
            $table->string('addressLine2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('SSN')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name')->nullable();
            $table->dropColumn('address')->nullable();
            $table->dropColumn('plan_start_date')->nullable();
            $table->dropColumn('plan_end_date')->nullable();
            $table->dropColumn('address2')->nullable();
            $table->dropColumn('country_id')->nullable();
            $table->dropColumn('state_id')->nullable();
            $table->dropColumn('city_id')->nullable();
            $table->dropColumn('zipcode')->nullable();
        });
    }
}
