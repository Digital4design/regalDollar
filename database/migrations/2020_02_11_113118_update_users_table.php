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
            $table->string('first_name')->after('password')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->text('address')->after('last_name')->nullable();
            $table->string('plan_start_date')->after('address')->nullable();
            $table->string('plan_end_date')->after('plan_start_date')->nullable();
            $table->text('address2')->after('plan_end_date')->nullable();
            $table->integer('country_id')->after('address2')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->after('country_id')->nullable();
            $table->integer('city_id')->unsigned()->after('state_id')->nullable();
            $table->string('zipcode')->after('city_id')->nullable();
            $table->string('accountType')->after('zipcode')->nullable();
            $table->string('phoneNumber')->after('accountType')->nullable();
            $table->string('birthday')->after('phoneNumber')->nullable();
            $table->string('social_security_number')->after('birthday')->nullable();

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
            $table->dropColumn('accountType')->nullable();
            $table->dropColumn('phoneNumber')->nullable();
            $table->dropColumn('birthday')->nullable();
            $table->dropColumn('social_security_number')->nullable();
        });
    }
}
