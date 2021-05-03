<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvisoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // list of students
        Schema::create('advisories', function (Blueprint $table) {
            $table->id('id');
            $table->boolean('is_old')->default(1);
            $table->integer('designation_id');
            $table->integer('level_id');
            $table->integer('student_id');
            $table->integer('guardian_id')->nullable();
            $table->string('relationship')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->string('image_ext')->default(0);
            $table->string('credentials')->nullable();
            $table->string('grades')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('advisories');
    }
}
