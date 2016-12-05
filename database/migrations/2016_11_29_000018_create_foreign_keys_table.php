<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     * @table persons
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persons', function(Blueprint $table) {
            $table->foreign('classes_id', 'fk_persons_classes_idx')
                  ->references('id')
                  ->on('classes')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
        Schema::table('persons', function(Blueprint $table) {
            $table->dropForeign('fk_persons_classes_idx');
        });
     }
}