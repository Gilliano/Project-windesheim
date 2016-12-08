<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsHasQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     * @table persons_has_questions
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons_has_questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('person_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('answer')->unsigned();
            $table->text('optional')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['person_id', 'question_id']);
            $table->foreign('person_id', 'fk_persons_has_questions_persons1_idx')
                ->references('id')->on('persons')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('question_id', 'fk_persons_has_questions_questions1_idx')
                ->references('id')->on('questions')
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
       Schema::dropIfExists('persons_has_questions');
     }
}
