<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('cat_id');
            $table->unsignedBigInteger('post_id');
            $table->string('cat_name');            
            $table->mediumText('cat_desc');
            $table->float('cat_fee');
            $table->float('cat_distance');
            $table->time('cat_starttime');
            $table->integer('cat_limit')->unsigned();
            $table->float('cat_prize');
            $table->boolean('cat_gender');       
            
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
