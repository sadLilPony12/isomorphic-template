<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // personnal_infos
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('phone')->nullable();
            $table->string('tongue')->nullable();
            $table->string('ip')->nullable();
            $table->string('religion')->nullable();
            $table->string('track')->nullable();
            $table->string('strand')->nullable();
            $table->string('fatherObj')->nullable();
            $table->string('motherObj')->nullable();
            $table->string('credential')->nullable(); // collections
            $table->softDeletes();
            $table->timestamps();
            // index
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->comment = "It's a true way!";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
