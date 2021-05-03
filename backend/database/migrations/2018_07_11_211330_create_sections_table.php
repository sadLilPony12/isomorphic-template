<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_id');
            $table->string('school_id');
            $table->unsignedBigInteger('level_id');
            $table->string('name');            
            $table->string('trackStrand')->nullable();
            $table->string('accumulate')->nullable()->comments('number of students');
            $table->string('adviser_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // index
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('adviser_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
