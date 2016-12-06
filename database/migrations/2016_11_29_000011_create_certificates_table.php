<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     * @table certificates
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->text('description')->nullable();
            $table->timestamp('earned_at');
            $table->timestamp('valid_until')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('privacy_level_id')->unsigned();
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_certivicate_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('privacy_level_id', 'fk_certificates_privacy_levels1_idx')
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
       Schema::dropIfExists('certificates');
     }
}
