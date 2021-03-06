<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountViewItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_view_items', function (Blueprint $table) {
            $table->integer('stu_id')->index()->unsigned();
            $table->biginteger('item_id')->index()->unsigned();
          
            $table->foreign('stu_id')->references('stu_id')->on('students')->onDelete('cascade');
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade');
            $table->primary(['stu_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('count_view_items');
    }
}
