<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('firstName');
            $table->string('lastName');
            $table->string('address', 255);
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->integer('postcode');            
            $table->string('contactNumber');

            $table->date('p_dob')->nullable();
            $table->string('p_gender')->nullable();
            $table->string('p_emergencyName')->nullable();
            $table->string('p_emergencyContactNumber')->nullable();
            $table->string('p_shirtSize')->nullable();
            
            $table->timestamps();

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
        Schema::dropIfExists('profiles');
    }
}
