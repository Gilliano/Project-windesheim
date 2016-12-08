<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsRateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     * @table persons_has_surveys
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons_rate_educations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('person_id')->unsigned();
            $table->integer('education_id')->unsigned();
            $table->integer('rating')->unsigned();
            $table->text('comment')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('person_id', 'fk_persons_rate_educations_persons1_idx')
                ->references('id')->on('persons')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('education_id', 'fk_persons_rate_educations_educations1_idx')
                ->references('id')->on('educations')
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
       Schema::dropIfExists('persons_rate_educations');
     }
}
