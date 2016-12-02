<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivacyLevelsTable extends Migration
{
    /**
     * Run the migrations.
     * @table privacy_levels
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacy_levels', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 25);
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
       Schema::dropIfExists('privacy_levels');
     }
}
