<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cliente;

return new class extends Migration {
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('apellidos', 60);
            $table->char('dni', 9);
            $table->string('email', 40);
            $table->string('telefono', 20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cliente');
    }
};
