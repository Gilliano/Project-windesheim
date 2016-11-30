<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     * @table companies
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->text('description');
            $table->integer('users_id')->unsigned();
            $table->integer('privacy_levels_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_companies_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('privacy_levels_id', 'fk_companies_privacy_levels1_idx')
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
       Schema::dropIfExists('companies');
     }
}
