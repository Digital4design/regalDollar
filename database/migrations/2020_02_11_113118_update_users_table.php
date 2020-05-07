<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('first_name')->after('password')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->text('address')->after('last_name')->nullable();
            $table->text('address2')->after('address')->nullable();
            $table->integer('country_id')->after('address2')->nullable();
            $table->integer('state_id')->after('country_id')->nullable();
            $table->string('state')->after('state_id')->nullable();
            $table->integer('city_id')->after('state')->nullable();
            $table->string('city')->after('city_id')->nullable();
            $table->string('zipcode')->after('city_id')->nullable();
            $table->string('accountType')->after('zipcode')->nullable();
            $table->string('phoneNumber')->after('accountType')->nullable();
            $table->string('birthday')->after('phoneNumber')->nullable();
            $table->string('social_security_number')->after('birthday')->nullable();
            $table->string('country_citizenship')->after('social_security_number')->nullable();
            $table->string('country_residence')->after('country_citizenship')->nullable();
            $table->string('indicateagreement')->after('country_residence')->nullable();
            $table->string('reinvestment')->after('indicateagreement')->nullable();
            $table->string('is_verify')->after('reinvestment')->nullable()->comment = 'For custume verification';            
        });
    }
    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name')->after('password')->nullable();
            $table->dropColumn('last_name')->after('first_name')->nullable();
            $table->dropColumn('address')->after('last_name')->nullable();
            $table->dropColumn('address2')->after('address')->nullable();
            $table->dropColumn('country_id')->after('address2')->nullable();
            $table->dropColumn('state_id')->after('country_id')->nullable();
            $table->dropColumn('city_id')->after('state_id')->nullable();
            $table->dropColumn('zipcode')->after('city_id')->nullable();
            $table->dropColumn('accountType')->after('zipcode')->nullable();
            $table->dropColumn('phoneNumber')->after('accountType')->nullable();
            $table->dropColumn('birthday')->after('phoneNumber')->nullable();
            $table->dropColumn('social_security_number')->after('birthday')->nullable();
            $table->dropColumn('country_citizenship')->after('social_security_number')->nullable();
            $table->dropColumn('country_residence')->after('country_citizenship')->nullable();
            $table->dropColumn('indicateagreement')->after('country_residence')->nullable();
        });
    }
}