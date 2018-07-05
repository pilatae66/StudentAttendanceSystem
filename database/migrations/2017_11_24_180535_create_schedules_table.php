<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('schedules', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('event_id');
      $table->foreign('event_id')
      ->references('event_id')->on('events')
      ->onDelete('cascade');
      $table->time('event_time');
      $table->integer('duration');
      $table->string('sign_type');
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
    Schema::dropIfExists('schedules');
  }
}
