<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id',100)->nullable();
            $table->string('password',180)->nullable();
            $table->string('name',100)->nullable();
            $table->boolean('admin_status')->default(0);
            $table->timestamps();
        });

        \App\Model\Admin::create([
            'admin_id' => 'admin001',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'name' => 'Admin',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
