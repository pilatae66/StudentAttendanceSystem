<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('events', function (Blueprint $table) {
      $table->increments('event_id');
      $table->string('event_name');
      $table->date('event_date');
      $table->string('school_year');
      $table->string('semester');
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
    Schema::dropIfExists('events');
  }
}
