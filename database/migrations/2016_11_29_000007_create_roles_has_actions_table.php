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
            $table->integer('roles_id')->unsigned();
            $table->integer('actions_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['roles_id', 'actions_id']);

            $table->foreign('roles_id', 'fk_role_has_actions_role1_idx')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('actions_id', 'fk_role_has_actions_actions1_idx')
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
