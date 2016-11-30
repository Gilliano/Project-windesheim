<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     * @table persons
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('firstname', 45);
            $table->string('lastname', 45);
            $table->timestamp('birthday')->nullable();
            $table->text('autobiography')->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('privacy_levels_id')->unsigned();
            $table->integer('jobs_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_persons_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('privacy_levels_id', 'fk_persons_privacy_levels1_idx')
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
       Schema::dropIfExists('persons');
     }
}