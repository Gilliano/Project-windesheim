<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsHasSurveysTable extends Migration
{
    /**
     * Run the migrations.
     * @table persons_has_surveys
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons_has_surveys', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('person_id')->unsigned();
            $table->integer('survey_id')->unsigned();
            $table->integer('rating')->unsigned();
            $table->text('comment')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['person_id', 'survey_id']);

            $table->foreign('person_id', 'fk_persons_has_surveys_persons1_idx')
                ->references('id')->on('persons')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('survey_id', 'fk_persons_has_surveys_surveys1_idx')
                ->references('id')->on('surveys')
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
       Schema::dropIfExists('persons_has_surveys');
     }
}
