<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{

    public function up()
    {
        $presidencial = DB::table('rooms')->insertGetId([
            'codigo' => '0001',
            'nombre' => 'La buardilla del hotel',
            'tipo' => 'pr',
            'estado' => 'disp',
            'numero_camas' => 2,
            'precio_base' => 190.0,
            'max_ocupantes' => 4,
            'terraza' => '1'
        ]);
        $password = 'cliente1';
        $usuario1 = DB::table('users')->insertGetId([
            'name' => 'cliente1',
            'email' => 'cliente1@mail.laravel',
            'email_verified_at' => null,
            'password' => Hash::make($password),
            'remember_token' => null
        ]);
        $cliente1 = DB::table('clients')->insertGetId([
            'user_id' => $usuario1,
            'nombre' => 'pepito',
            'apellidos' => 'benito',
            'dni' => '123456789',
            'telefono' => '9993'
        ]);
        $reserva1 = DB::table('bookings')->insertGetId([
            'codigo' => 'aaaa',
            'precio' => 500.0,
            'observacion' => 'reserva satisfactoria',
            'client_id' => $cliente1
        ]);
        DB::table('room_bookings')->insertGetId([
            'room_id' => $presidencial,
            'booking_id' => $reserva1,
            'fecha_entrada' => '2022-01-22 17:30:00',
            'fecha_salida' => '2022-01-25 17:30:01'
        ]);


    }

    public function down()
    {

    }
};
