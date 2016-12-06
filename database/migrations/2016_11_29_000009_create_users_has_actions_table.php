<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasActionsTable extends Migration
{
    /**
     * Run the migrations.
     * @table users_has_actions
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_actions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned();
            $table->integer('action_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['user_id', 'action_id']);

            $table->foreign('user_id', 'fk_users_has_actions_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('action_id', 'fk_users_has_actions_actions1_idx')
                ->references('id')->on('actions')
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
       Schema::dropIfExists('users_has_actions');
     }
}
