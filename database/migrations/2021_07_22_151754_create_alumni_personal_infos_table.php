<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('alumni_id',20)->nullable();
            $table->text('mailing_address')->nullable();
            $table->string('district',100)->nullable();
            $table->string('upazilla',100)->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('current_country',100)->nullable();
            $table->string('permanent_country',100)->nullable();
            $table->string('father_name',100)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('photo_link',100)->nullable();
            $table->string('facebook_link',180)->nullable();
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
        Schema::dropIfExists('alumni_personal_infos');
    }
}
