<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInformationTable extends Migration
{
    /**
     * Run the migrations.
     * @table users_information
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_information', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('address', 35)->nullable();
            $table->string('address_number', 10)->nullable();
            $table->string('city', 35);
            $table->string('zip_code', 9)->nullable();
            $table->string('alternative_email', 120)->nullable();
            $table->string('mobile_number', 16)->nullable();
            $table->string('additional_number', 16)->nullable();
            $table->integer('users_id')->unsigned();
            $table->integer('privacy_levels_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_users_information_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('privacy_levels_id', 'fk_users_information_privacy_levels1_idx')
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
       Schema::dropIfExists('users_information');
     }
}
