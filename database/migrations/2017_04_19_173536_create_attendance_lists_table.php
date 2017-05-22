<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            // $table->integer('idpensyarah')->unsigned();
            // $table->integer('idpelajar')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('nomatrik');
            $table->string('status')->default('Absence');
            // $table->string('kursus');
            $table->timestamps();

            //foreign

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_lists');
    }
}
