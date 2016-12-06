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
            $table->date('graduated_year');
            $table->string('education', 45);
            $table->string('education_classcode', 25)->nullable();
            $table->integer('person_id')->unsigned();
            $table->integer('school_id')->unsigned()->nullable();
            $table->string('school_name', 45)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('person_id', 'fk_educations_persons1_idx')
                ->references('id')->on('persons')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('school_id', 'fk_diplomas_schools1_idx')
                ->references('id')->on('schools')
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
