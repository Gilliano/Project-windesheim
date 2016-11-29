<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiplomasTable extends Migration
{
    /**
     * Run the migrations.
     * @table diplomas
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diplomas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('cohort_start');
            $table->date('cohort_end');
            $table->date('graduated_year');
            $table->string('education', 45);
            $table->integer('education_coordinator')->unsigned()->nullable();
            $table->string('education_classcode', 25)->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('school_id')->unsigned()->nullable();
            $table->string('school_name', 45)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('education_coordinator', 'fk_educations_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_educations_users2_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('school_id', 'fk_diplomas_school1_idx')
                ->references('id')->on('school')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('diplomas');
     }
}
