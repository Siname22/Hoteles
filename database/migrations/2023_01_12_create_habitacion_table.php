<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Habitacion;


return new class extends Migration
{
    public function up()
    {
        Schema::create('habitacion', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20);
            $table->string('tipo', 15);
            $table->string('estado', 5);
            $table->integer('numero_camas');
            $table->double('precio_base');
            $table->boolean('terraza');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('habitacion');
    }
};
