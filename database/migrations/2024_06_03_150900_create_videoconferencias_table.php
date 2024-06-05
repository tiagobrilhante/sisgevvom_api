<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoconferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('videoconferencias', function (Blueprint $table) {
            $table->id();
            $table->longText('missao');
            $table->date('data');
            $table->time('hora');
            $table->date('data_teste');
            $table->time('hora_teste');
            $table->string('solicitante');
            $table->string('link');
            $table->string('plataforma');
            $table->string('local');
            $table->string('status');
            $table->longText('obs');
            $table->bigInteger('responsavel_id')->unsigned()->index()->nullable();
            $table->foreign('responsavel_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('videoconferencias');
    }
}
