<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('id');
            $table->integer('level')->comment('year level');
            $table->string('code');
            $table->string('name');
            $table->string('description');
            $table->integer('lab')->default(0)->comment('Laboratory');
            $table->integer('lec')->default(0)->comment('Lecture');
            $table->integer('Units')->default(0);
            $table->boolean('is_major')->default(false);
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
        Schema::dropIfExists('subjects');
    }
}
