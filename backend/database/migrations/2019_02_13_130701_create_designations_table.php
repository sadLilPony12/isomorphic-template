<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Required before giving advisories
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('batch_id');
            $table->string('level_id');
            $table->string('section_id');
            $table->string('faculty_id');
            $table->string('user_id');
            $table->string('room');
            $table->text('officers');
            $table->text('issues');
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
        Schema::dropIfExists('designations');
    }
}
