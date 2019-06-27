<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('pay_id');
            $table->unsignedBigInteger('stud_id');
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('pay_amount');
            $table->string('pay_type');
            $table->string('pay_to');
            $table->string('semester');
            $table->string('school_year');
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
        Schema::dropIfExists('payments');
    }
}
