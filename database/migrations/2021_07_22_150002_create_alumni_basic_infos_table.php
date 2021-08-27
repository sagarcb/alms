<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_basic_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_info_id')->nullable();
            $table->unsignedBigInteger('program_info_id')->nullable();
            $table->string('alumni_id',20)->nullable();
            $table->string('previous_alumni_id',20)->nullable();
            $table->string('email_id',100)->nullable();
            $table->string('name',100)->nullable();
            $table->string('password',100)->nullable();
            $table->integer('mobile_number')->nullable();
            $table->string('email_verification_code',100)->nullable();
            $table->boolean('email_verification_status')->default(0);
            $table->boolean('approve_status')->default(0);
            $table->boolean('active_status')->default(0);
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
        Schema::dropIfExists('alumni_basic_infos');
    }
}
