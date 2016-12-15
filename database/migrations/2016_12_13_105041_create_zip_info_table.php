<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('zip_info'))
            return;

        Schema::create('zip_info', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('zip_code')->unsigned();
            $table->string('city', 35);
            $table->string('alt_name', 128)->nullable();
            $table->string('town', 35)->nullable();
            $table->string('district', 35);
            $table->integer('netnumber')->unsigned();
            $table->double('latitude');
            $table->double('longitude');
            $table->enum('types', ['Onbekend', 'Postbus', 'Adres', 'Adres + Postbus']);
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
//        Schema::dropIfExists('zip_info');
    }
}
