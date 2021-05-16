<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
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
            $table->string('first_name', 500)->nullable(false);
            $table->string('last_name', 500);
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('designation')->nullable();
            $table->string('department_id')->nullable();
            $table->text('address', 500);
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20);
            $table->text('short_biography')->nullable();
            $table->string('image')->nullable();
            $table->string('specialist');
            $table->string('birth_date')->nullable();
            $table->string('sex');
            $table->string('blood_group', 150)->nullable();
            $table->string('education_degree')->nullable();
            $table->string('status', 2);
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
}
