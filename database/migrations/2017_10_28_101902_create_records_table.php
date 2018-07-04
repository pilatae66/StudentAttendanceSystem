<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('records', function (Blueprint $table) {
      $table->increments('record_id');
      $table->string('stud_id');
      $table->integer('event_id')->nullable();
      $table->string('record_title')->nullable();
      $table->string('sign_type');
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
    Schema::dropIfExists('records');
  }
}
