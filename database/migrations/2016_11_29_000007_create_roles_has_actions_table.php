<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesHasActionsTable extends Migration
{
    /**
     * Run the migrations.
     * @table roles_has_actions
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_has_actions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('role_id')->unsigned();
            $table->integer('action_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['role_id', 'action_id']);

            $table->foreign('role_id', 'fk_role_has_actions_role1_idx')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('action_id', 'fk_role_has_actions_actions1_idx')
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
       Schema::dropIfExists('roles_has_actions');
     }
}
