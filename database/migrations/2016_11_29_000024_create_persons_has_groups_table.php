<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsHasGroupsTable extends Migration
{
    /**
     * Run the migrations.
     * @table achievements
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons_has_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('person_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->text('minor')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['person_id', 'group_id']);
            $table->foreign('person_id', 'fk_persons_has_groups_persons1_idx')
                ->references('id')->on('persons')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('group_id', 'fk_persons_has_groups_groups1_idx')
                ->references('id')->on('groups')
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
       Schema::dropIfExists('persons_has_groups');
     }
}
