<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('students', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nomatrik');
          $table->string('namapelajar');
          $table->string('tahun');
          $table->string('program');
          $table->string('subjek');
          $table->string('nombortelefon');


          $table->integer('user_id')->unsigned();
          // $table->string('subjectname');

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
        Schema::dropIfExists('students');
    }
}
