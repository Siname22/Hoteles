<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        $presidencial = DB::table('habitacion')->insertGetId([
            'cod' => '0001',
            'nombre' => 'La buardilla del hotel',
            'tipo' => 'pr',
            'estado' => 'disp',
            'num_camas' => 2,
            'precio_base' => 190.0,
            'max_ocupantes' => 4,
            'terraza' => '1'
        ]);
        $cliente1 = DB::table('cliente')->insertGetId([
            'nombre' => 'pepito',
            'apellidos' => 'benito',
            'dni' => '123456789',
            'email' => 'pepitonujsjs',
            'telefono' => '9993'
        ]);
        $reserva1 = DB::table('reserva')->insertGetId([
            'fecha_entrada' => '2022-01-22 17:30:00',
            'fecha_salida' => '2022-01-25 17:30:01',
            'precio' => 500.0,
            'observacion' => 'reserva satisfaciente',
            'cliente_id' => $cliente1
        ]);
        $reserva_habitacion = DB::table('z_reserva_habitacion')->insertGetId([
            'habitacion_id' => $presidencial,
            'reserva_id' => $reserva1
        ]);


    }

    public function down()
    {

    }
};
