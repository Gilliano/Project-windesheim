<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesHasPrivacyLevelsTable extends Migration
{
    /**
     * Run the migrations.
     * @table roles_has_privacy_levels
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_has_privacy_levels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('roles_id')->unsigned();
            $table->integer('privacy_levels_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['roles_id', 'privacy_levels_id']);

            $table->foreign('roles_id', 'fk_roles_has_privacy_levels_roles1_idx')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('privacy_levels_id', 'fk_roles_has_privacy_levels_privacy_levels1_idx')
                ->references('id')->on('privacy_levels')
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
       Schema::dropIfExists('roles_has_privacy_levels');
     }
}
