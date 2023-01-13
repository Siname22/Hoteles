<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Habitacion;
use App\Models\Cliente;
use App\Models\Reserva;

return new class extends Migration {
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->double('precio_reserva');
            $table->string('descripcion', 200);
            $table->foreignIdFor(Habitacion::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignIdFor(Cliente::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reserva');
    }
};
