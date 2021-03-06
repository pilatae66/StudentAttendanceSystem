<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('students', function (Blueprint $table) {
      $table->string('stud_id');
      $table->string('fname');
      $table->string('lname');
      $table->string('stud_course');
      $table->string('stud_year');
      $table->integer('stud_fines')->nullable();
      $table->string('isActive');
      $table->timestamps();
      //
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('students');
  }
}
