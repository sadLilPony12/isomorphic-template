<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id('id');
            $table->string('user_id')->nullable();
            $table->string('school_id');
            $table->enum('stages',[
                'elem',
                'jh',
                'sh',
                'Colleges',
                'Masteral',
                'Doctorate'
            ])->nullable();
            $table->string('yrlvl')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
