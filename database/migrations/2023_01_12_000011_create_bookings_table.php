<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Client;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->double('precio');
            $table->string('observacion', 200);
            $table->foreignIdFor(Client::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
