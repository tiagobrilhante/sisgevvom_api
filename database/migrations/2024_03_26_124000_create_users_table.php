<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->unique();
            $table->string('password');
            $table->string('nome_completo')->nullable();
            $table->string('sexo')->nullable();
            $table->string('nome_guerra')->nullable();
            $table->bigInteger('posto_grad_id')->unsigned()->index()->nullable();
            $table->foreign('posto_grad_id')
                ->references('id')
                ->on('postograds')->onDelete('cascade');
            $table->date('data_nasc')->nullable()->default(null);
            $table->date('data_praca')->nullable()->default(null);
            $table->date('data_pronto_om')->nullable()->default(null);
            $table->string('email')->nullable();
            $table->boolean('reset')->default(true);

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
        Schema::dropIfExists('users');
    }
}
