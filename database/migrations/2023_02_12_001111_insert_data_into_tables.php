<?php

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{

    public function up()
    {
        //HABITACIONES
        $room1 = DB::table('rooms')->insertGetId([
            'codigo' => '0001',
            'nombre' => 'La Buardilla del hotel',
            'tipo' => 'pr',
            'estado' => 'disp',
            'numero_camas' => 2,
            'precio_base' => 190.0,
            'max_ocupantes' => 4,
            'terraza' => '1'
        ]);
        $room2 = DB::table('rooms')->insertGetId([
            'codigo' => '0002',
            'nombre' => 'Quad Junior Suite 1',
            'tipo' => 'JS',
            'estado' => 'disp',
            'numero_camas' => 4,
            'precio_base' => 100.0,
            'max_ocupantes' => 5,
            'terraza' => '0'
        ]);

        //USUARIOS CLIENTES
        $passwordClient1 = 'cliente1';
        $usuario1 = DB::table('users')->insertGetId([
            'name' => 'cliente1',
            'email' => 'cliente1@mail.laravel',
            'email_verified_at' => null,
            'password' => Hash::make($passwordClient1),
            'remember_token' => null
        ]);
        $passwordCLient2 = 'cliente2';
        $usuario2 = DB::table('users')->insertGetId([
            'name' => 'cliente2',
            'email' => 'cliente2@mail.laravel',
            'email_verified_at' => null,
            'password' => Hash::make($passwordCLient2),
            'remember_token' => null
        ]);
        //CLIENTES
        $cliente1 = DB::table('clients')->insertGetId([
            'user_id' => $usuario1,
            'nombre' => 'Pepito',
            'apellidos' => 'Benito',
            'dni' => '123456789',
            'telefono' => '9993'
        ]);
        $cliente2 = DB::table('clients')->insertGetId([
            'user_id' => $usuario2,
            'nombre' => 'Fulanito',
            'apellidos' => 'Sancho',
            'dni' => '987654321',
            'telefono' => '5497'
        ]);
        //USUARIOS EMPLEADOS
        $passwordEmployee1 = 'empleado1';
        $employee1 = DB::table('users')->insertGetId([
            'name' => 'empleado1',
            'email' => 'empleado1@mail.laravel',
            'email_verified_at' => null,
            'password' => Hash::make($passwordEmployee1),
            'remember_token' => null
        ]);
        //EMPLEADOS
        DB::table('employees')->insert([
            'user_id' => $employee1,
            'nombre'=> 'Javier',
            'apellidos' => 'Arroyo Molinos',
            'telefono' => '609106158',
            'rol' => 'admin'
        ]);


        //RESERVAS
        $reserva1 = DB::table('bookings')->insertGetId([
            'precio' => 500.0,
            'observacion' => 'reserva satisfactoria',
            'client_id' => $cliente1
        ]);
        $reserva2 = DB::table('bookings')->insertGetId([
            'precio' => 350.0,
            'observacion' => 'reserva complicada',
            'client_id' => $cliente2
        ]);

        $booking1 = Booking::find($reserva1);
        $booking1->rooms()->attach($room1, ['fecha_entrada' => '2023-01-22 13:00:00',
            'fecha_salida' => '2023-01-25 12:00:00']);

        $booking2 = Booking::find($reserva2);
        $booking2->rooms()->attach($room2, ['fecha_entrada' => '2023-02-13 13:00:00',
            'fecha_salida' => '2023-02-18 12:00:00']);

    }

    public function down()
    {

    }
};
