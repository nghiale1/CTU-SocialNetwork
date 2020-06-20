<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectsStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects_student', function (Blueprint $table) {

            //foreign key
            $table->integer('sub_id')->index()->unsigned();
            $table->integer('stu_id')->index()->unsigned();
            
            $table->foreign('sub_id')->references('sub_id')->on('subjects')->onDelete('cascade');
            $table->foreign('stu_id')->references('stu_id')->on('students')->onDelete('cascade');
               
            $table->primary(['sub_id','stu_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
