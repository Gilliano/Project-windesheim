<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     * @table classes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->text('description')->nullable();
            $table->integer('coordinator')->unsigned();
            $table->dateTime('cohort_start');
            $table->dateTime('cohort_end');
            $table->integer('educations_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('educations_id', 'fk_classes_educations1_idx')
                ->references('id')->on('educations')
                ->onDelete('no action')
                ->onUpdate('no action');


            $table->foreign('coordinator', 'fk_classes_persons1_idx')
                ->references('id')->on('persons')
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
       Schema::dropIfExists('classes');
     }
}
