<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 500)->nullable(false);
            $table->string('last_name', 500);
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20);
            $table->string('blood_group', 150)->nullable();
            $table->string('sex');
            $table->string('birth_date')->nullable();
            $table->string('image')->nullable();
            $table->text('address', 500);
            $table->string('status', 2);
            $table->timestamps();
        });

        DB::update("ALTER TABLE patients AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
