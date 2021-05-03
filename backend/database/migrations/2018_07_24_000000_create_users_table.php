<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('school_id');
            $table->string('role_id')->default('student');
            $table->string('lrn')->nullable()->comment('Learner Reference Number');
            $table->string('ern')->nullable()->comment('Employee Reference Number');
            $table->string('name')->comment('nickname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->enum('suffix', ['SR', 'JR', 'III', 'IV','V'])->nullable();
            $table->boolean('is_male')->default(1);
            $table->string('phone')->nullable();
            $table->date('dob')->nullable()->comment('date of birth');
            $table->date('pob')->nullable()->comment('place of birth');
           
            $table->string('position')->nullable();
            $table->string('image_ext')->nullable();
            $table->string('session_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable(); 
            $table->string('sessionArray')->nullable();    
            $table->string('remark')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            // index
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
