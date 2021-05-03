<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuarterGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->enum('Quarter',[
                'Q1',
                'Q2',
                'Q3',
                'Q4'
            ]);
            $table->string('quizzes')->nullable();
            $table->string('activities')->nullable();
            $table->string('TermPaper')->nullable();
            $table->double('grades');
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
        Schema::dropIfExists('QuarterGreade');
    }
}
