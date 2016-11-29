<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     * @table jobs
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 70);
            $table->string('address', 45)->nullable();
            $table->string('address_number', 10)->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->string('city', 35);
            $table->string('function', 35);
            $table->integer('salary_min')->unsigned()->nullable();
            $table->integer('salary_max')->unsigned()->nullable();
            $table->timestamp('started_at')->nullable();
            $table->boolean('current_job')->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('privacy_levels_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_jobs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('privacy_levels_id', 'fk_jobs_privacy_levels1_idx')
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
       Schema::dropIfExists('jobs');
     }
}
