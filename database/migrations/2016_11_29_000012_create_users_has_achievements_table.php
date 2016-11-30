<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     * @table users_has_achievements
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_achievements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('users_id')->unsigned();
            $table->integer('achievements_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();

            $table->primary(['users_id', 'achievements_id']);

            $table->foreign('users_id', 'fk_users_has_achievements_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('achievements_id', 'fk_users_has_achievements_achievements1_idx')
                ->references('id')->on('achievements')
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
       Schema::dropIfExists('users_has_achievements');
     }
}
