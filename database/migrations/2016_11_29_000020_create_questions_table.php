<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     * @table questions
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('question')->nullable();
            $table->integer('survey_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('survey_id', 'fk_questions_surveys1_idx')
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
       Schema::dropIfExists('questions');
     }
}
