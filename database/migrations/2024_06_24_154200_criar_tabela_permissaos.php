<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaPermissaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissaos', function (Blueprint $table) {
            $table->id();
            $table->string('permissao');
            $table->bigInteger('funcao_id')->unsigned()->index();

            $table->foreign('funcao_id')
                ->references('id')
                ->on('funcaos');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissaos');
    }
}
