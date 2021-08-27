<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniAcademicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_academic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('alumni_id',20)->nullable();
            $table->integer('passing_year')->nullable();
            $table->string('passing_semester',20)->nullable();
            $table->unsignedBigInteger('program_info_id')->nullable();
            $table->integer('batch')->nullable();
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
        Schema::dropIfExists('alumni_academic_infos');
    }
}
