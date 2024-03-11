<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBairrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bairros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('regiao', ['norte', 'sul', 'leste', 'oeste', 'centro', 'zona rural']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bairros');
    }
}
