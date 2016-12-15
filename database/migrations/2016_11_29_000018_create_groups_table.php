<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     * @table classes
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->text('description')->nullable();
            $table->integer('coordinator')->unsigned();
            $table->dateTime('cohort_start');
            $table->dateTime('cohort_end');
            $table->integer('started_amount');
            $table->integer('education_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('education_id', 'fk_groups_educations1_idx')
                ->references('id')->on('educations')
                ->onDelete('no action')
                ->onUpdate('no action');


            $table->foreign('coordinator', 'fk_groups_persons1_idx')
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
       Schema::dropIfExists('groups');
     }
}
