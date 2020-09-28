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
        Schema::create('configuracion.users', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->integer('id_trabajador');
            $table->string('usuario')->unique();
            $table->text('password');
            $table->integer('estado');
            $table->integer('acceso');
            $table->integer('rol');
            $table->enum('perfil', ['F', 'M'])->default('M');
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
        Schema::dropIfExists('users');
    }
}
