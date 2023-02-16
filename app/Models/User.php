<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    public function comprobarAutorizacion($iduser)
    {
        $cliente = Client::select('*')
            ->where('user_id', '=', DB::raw($iduser))
            ->first();

        $employee = Employee::select('*')
            ->where('user_id', '=', DB::raw($iduser))
            ->first();

        if ($cliente) {

            $tipo = "Client";

        } else {

            if ($employee->rol == "admin") {

                $tipo = "Administrador";

            } elseif ($employee->rol == "") {

                $tipo = "Recepcion";

            } else {

                $tipo = "RRHH";

            }

        }

        return $tipo;
    }
}
