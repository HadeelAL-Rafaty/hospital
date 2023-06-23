<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('gender')->comment('M = Male , F = Female');
            $table->text('address');
            $table->string('phone');
            $table->string('avatar');
            $table->text('biography');
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departmentes')->onDelete('cascade');
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
        Schema::dropIfExists('doctors');
    }
};