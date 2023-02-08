<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{

    public function up()
    {
        //HABITACIONES
        $room1 = DB::table('rooms')->insertGetId([
            'codigo' => '0001',
            'nombre' => 'La Buuardilla del hotel',
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
        $passwordUser1 = 'cliente1';
        $usuario1 = DB::table('users')->insertGetId([
            'name' => 'cliente1',
            'email' => 'cliente1@mail.laravel',
            'email_verified_at' => null,
            'password' => Hash::make($passwordUser1),
            'remember_token' => null
        ]);
        $passwordUser2 = 'cliente2';
        $usuario2 = DB::table('users')->insertGetId([
            'name' => 'cliente2',
            'email' => 'cliente2@mail.laravel',
            'email_verified_at' => null,
            'password' => Hash::make($passwordUser2),
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
        $empleado1= DB::table('employees')->insertGetId([
            'user_id' => $employee1,
            'nombre'=> 'Javier',
            'apellidos' => 'Arroyo Molinos',
            'telefono' => '609106158',
            'rol' => 'empleado'
        ]);


        //RESERVAS
        $reserva1 = DB::table('bookings')->insertGetId([
            'codigo' => 'aaaa',
            'precio' => 500.0,
            'observacion' => 'reserva satisfactoria',
            'client_id' => $cliente1
        ]);
        $reserva2 = DB::table('bookings')->insertGetId([
            'codigo' => 'aaab',
            'precio' => 350.0,
            'observacion' => 'reserva complicada',
            'client_id' => $cliente2
        ]);

        //ASIGNACIONES
        DB::table('room_assignments')->insertGetId([
            'room_id' => $room1,
            'booking_id' => $reserva1,
            'fecha_entrada' => '2023-01-22 13:00:00',
            'fecha_salida' => '2023-01-25 12:00:00'
        ]);
        DB::table('room_assignments')->insertGetId([
            'room_id' => $room2,
            'booking_id' => $reserva2,
            'fecha_entrada' => '2023-02-13 13:00:00',
            'fecha_salida' => '2023-02-18 12:00:00'
        ]);

    }

    public function down()
    {

    }
};
