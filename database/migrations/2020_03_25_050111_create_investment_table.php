<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment', function (Blueprint $table) {
            $table->increments('id');
           // $table->integer('user_id')->nullable(); 
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->date('plan_start_date')->nullable();
            $table->date('plan_end_date')->nullable();
            $table->string('paypal_transaction_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('indicateagreement')->nullable();
            $table->string('reinvestment')->nullable();
            $table->enum('is_request', ['0', '1','2','3'])->default('0')->comment = '0 = No Request , 1 = Request for withdrow , 2 = Request accept, 3 Request reject';
            $table->string('linked_account')->nullable();
            $table->string('signature')->nullable();  
            $table->longText('admin_notes')->nullable();                    
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
        Schema::dropIfExists('investment');
    }
}
