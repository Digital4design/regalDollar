<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('ref_code')->after('steps_done')->nullable();
            $table->string('ref_by')->after('ref_code')->nullable(); 
            $table->enum('is_block', ['true', 'false'])->default('false')->after('ref_by')->comment = 'true and false'; 
            $table->string('blocked_at')->after('is_block')->nullable();    
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
            $table->dropColumn('ref_code')->after('steps_done')->nullable();
            $table->dropColumn('ref_by')->after('ref_code')->nullable();
            $table->dropColumn('is_block')->after('ref_by')->nullable();
            $table->dropColumn('blocked_at')->after('is_block')->nullable();
        });
    }
}
