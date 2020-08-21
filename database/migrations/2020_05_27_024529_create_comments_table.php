<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('com_id');
            $table->string('com_content');
            $table->bigInteger('com_idrep')->nullable();
            $table->timestamp('com_created')
            ->default(DB::raw('CURRENT_TIMESTAMP'));

            //foreign key
            $table->bigInteger('p_id')->index()->unsigned();
            $table->integer('stu_id')->index()->unsigned();
            
            $table->foreign('stu_id')->references('stu_id')->on('students')->onDelete('cascade');
            $table->foreign('p_id')->references('p_id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
