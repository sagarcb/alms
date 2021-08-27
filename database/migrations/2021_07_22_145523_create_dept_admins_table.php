<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dept_admins', function (Blueprint $table) {
            $table->id();
            $table->string('dept_admin_id',100)->nullable();
            $table->string('password',100)->nullable();
            $table->string('name',100)->nullable();
            $table->string('dept_code',10)->nullable();
            $table->boolean('dept_admin_status')->default(0);
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
        Schema::dropIfExists('dept_admins');
    }
}
