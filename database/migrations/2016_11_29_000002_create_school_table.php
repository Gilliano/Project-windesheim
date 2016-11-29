<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     * @table school
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
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
       Schema::dropIfExists('school');
     }
}
