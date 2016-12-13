<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     * @table educations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->text('description')->nullable();
            $table->integer('length');
            $table->integer('school_id')->unsigned();
            $table->integer('education_collection_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('school_id', 'fk_educations_schools1_idx')
                ->references('id')->on('schools')
                ->onDelete('no action')
                ->onUpdate('no action');


            $table->foreign('education_collection_id', 'fk_educations_educations_collection__idx')
                ->references('id')->on('educations_collection')
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
       Schema::dropIfExists('educations');
     }
}
