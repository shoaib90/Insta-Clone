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
            $table->bigIncrements('id')->nullable();
            $table->unsignedBigInteger('user_id');  //This is our foreign key, from user table
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('user_id'); //Adding it's index for reference, from user table.
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
