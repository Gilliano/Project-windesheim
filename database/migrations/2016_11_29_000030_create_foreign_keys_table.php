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
//        Schema::table('persons', function(Blueprint $table) {
//            $table->foreign('group_id', 'fk_persons_groups_idx')
//                  ->references('id')
//                  ->on('groups')
//                  ->onDelete('restrict')
//                  ->onUpdate('restrict');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
//        Schema::table('persons', function(Blueprint $table) {
//            $table->dropForeign('fk_persons_groups_idx');
//        });
     }
}