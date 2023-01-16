<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->char('codigo', 4);
            $table->string('nombre', 200);
            $table->string('tipo', 4);
            $table->string('estado', 5);
            $table->integer('numero_camas');
            $table->double('precio_base');
            $table->integer('max_ocupantes');
            $table->boolean('terraza');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('habitacions');
    }
};
