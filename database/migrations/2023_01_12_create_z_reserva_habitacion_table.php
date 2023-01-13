<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Habitacion_Reserva;


return new class extends Migration
{
    public function up()
    {
        Schema::create('z_reserva_habitacion', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Habitacion::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignIdFor(Reserva::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('z_reserva_habitacion');
    }
};
