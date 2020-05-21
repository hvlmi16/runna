<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('discipline');
            $table->mediumText('description');
            $table->string('event_address', 255);
            $table->string('event_city');
            $table->integer('event_postcode');
            $table->string('event_state');
            $table->string('event_country');
            $table->date('event_date');
            $table->time('event_time');
            $table->date('event_enddate');
            $table->time('event_endtime');
            $table->date('reg_opendate');
            $table->time('reg_opentime');
            $table->date('reg_closedate');
            $table->time('reg_closetime');
            $table->longText('event_waiver');
            $table->string('event_image');
            $table->string('event_shirt');
            $table->string('event_medal');          
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
