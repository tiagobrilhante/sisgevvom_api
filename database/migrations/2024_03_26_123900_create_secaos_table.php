<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('sigla');
            $table->integer('secao_pai')->nullable();
            $table->bigInteger('om_id')->unsigned()->index();

            $table->foreign('om_id')
                ->references('id')
                ->on('oms');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secaos');
    }
}
