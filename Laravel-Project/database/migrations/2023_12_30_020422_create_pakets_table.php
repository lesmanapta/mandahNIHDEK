<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketsTable extends Migration
{
    public function up()
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_paket', ['5mb', '10mb', '20mb']);
            $table->string('email');
            $table->string('nama');
            $table->string('nomor_hp');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pakets');
    }
}
