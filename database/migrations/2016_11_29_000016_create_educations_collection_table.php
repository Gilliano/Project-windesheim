<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsCollectionTable extends Migration
{
    /**
     * Run the migrations.
     * @table persons_has_surveys
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations_collection', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('educations_collection');
     }
}
