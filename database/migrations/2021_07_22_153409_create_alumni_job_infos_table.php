<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniJobInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_job_infos', function (Blueprint $table) {
            $table->id();
            $table->string('alumni_id',20)->nullable();
            $table->string('cv_link',100)->nullable();
            $table->text('current_position')->nullable();
            $table->text('company_name')->nullable();
            $table->string('job_category',180)->nullable();
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
        Schema::dropIfExists('alumni_job_infos');
    }
}
