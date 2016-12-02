<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     * @table schools
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('address_number', 10)->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->string('telephone_number', 16)->nullable();
            $table->string('email', 120)->nullable();
            $table->string('city', 35);
            $table->softDeletes();
            $table->nullableTimestamps();
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
