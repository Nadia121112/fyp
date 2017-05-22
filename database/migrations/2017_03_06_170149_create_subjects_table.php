<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('idpensyarah')->unsigned();
            $table->string('codesubject');
            $table->string('subjectname');
            $table->string('classtype');
            $table->string('day');
            $table->string('starttime');
            $table->string('endtime');

            $table->integer('user_id')->unsigned();
            // $table->string('subjectname');

            $table->timestamps();

            //foreign key

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
        Schema::dropIfExists('subjects');
    }
}
