<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id('id');
            $table->string('school_id');
            $table->enum('category',[
                'elem',
                'JH',
                'SH',
                'Colleges',
                'Masteral',
                'Doctorate'
            ])->nullable();
            $table->enum('semester',[
                '1st',
                '2nd',
                '3rd'
            ])->nullable();
            $table->string('SY')->comment('School Year');
            $table->date('e_start')->nullable()->comment('Enrollment');
            $table->date('e_end')->nullable();
            $table->date('c_start')->nullable()->comment('Classes');
            $table->date('c_end')->nullable();
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
        Schema::dropIfExists('batches');
    }
}
