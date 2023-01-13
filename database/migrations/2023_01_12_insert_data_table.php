<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        $presidencial = DB::table('habitacion')->insertGetId([
            'codigo' => 'B1',
            'tipo' => 'presidencial',
            'estado' => 'disp',
            'numero_camas' => 2,
            'precio_base' => 190.0,
            'terraza' => '1'
        ]);
        $cliente1 = DB::table('cliente')->insertGetId([
            'nombre' => 'pepito',
            'apellidos' => 'benito',
            'dni' => '9999999',
            'email' => 'pepitonujsjs',
            'telefono' => '9993'
        ]);
        $reserva1 = DB::table('reserva')->insertGetId([
            'fecha_entrada' => '2022-01-22 17:30:00',
            'fecha_salida' => '2022-01-25 17:30:01',
            'precio_reserva' => 500.0,
            'descripcion' => 'reserva satisfaciente',
            'habitacion_id' => $presidencial,
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
