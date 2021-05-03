<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('acronyms')->unique();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('region')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('cp')->nullable()->comment('Contact Person');
            $table->string('extname')->nullable();
            $table->string('credentials')->nullable()->comment('org chart');
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
        Schema::dropIfExists('schools');
    }
}
