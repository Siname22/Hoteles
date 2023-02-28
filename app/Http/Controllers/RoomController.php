<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::orderBy('codigo')->get();
        return view('paginas/rooms/index', compact('rooms'));
    }

    public function create()
    {
        return view('paginas/rooms/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cogigo'        =>  'required',
            'nombre'        =>  'required',
            'tipo'          =>  'required',
            'estado'        =>  'required',
            'numero_camas'  =>  'required',
            'precio_base'   =>  'required',
            'max_ocupantes' =>  'required',
            'terraza'       =>  'required'
        ]);

        $room = new Room();
        $room->codigo = $request->codigo;
        $room->nombre = $request->codigo;
        $room->tipo = $request->codigo;
        $room->estado = $request->codigo;
        $room->numero_camas = $request->codigo;
        $room->precio_base = $request->precio_base;
        $room->max_ocupantes = $request->cmax_ocupantes;
        $room->terraza = $request->terraza;
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'fechaEntrada'  =>  'required',
            'fechaSalida'   =>  'required',
            'numeroCamas'   =>  'required',
            'terraza'       =>  'required',
            'roomId'        =>  'required',
            'bookingId'     =>  ''
        ]);

        $params = [$request->fechaEntrada, $request->fechaSalida, $request->numeroCamas, $request->terraza,
            $request->roomId];
        if (isset($request->bookingId)) {
            $params = [$request->fechaEntrada, $request->fechaSalida, $request->numeroCamas, $request->terraza,
                $request->roomId, $request->bookingId];
        }

        $id = $request->roomId;

        $room = Room::select('*')
            ->where('id', '=', DB::raw($id))
            ->first();

        $prms = [$params, $room];

        return view('paginas/clientes/rooms/show', compact('prms'));
    }

    public function edit(Room $room)
    {
        return view('paginas/rooms/edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $this -> validate($request, [
            'id'            =>  'required',
            'codigo'        =>  'required',
            'nombre'        =>  'required',
            'tipo'          =>  'required',
            'estado'        =>  'required',
            'num_camas'     =>  'required',
            'precio_base'   =>  'required',
            'max_ocupantes' =>  'required',
            'terraza'       => ''
        ]);

        $room->id               =   $request->id;
        $room->codigo           =   $request->codigo;
        $room->nombre           =   $request->nombre;
        $room->tipo             =   $request->tipo;
        $room->estado           =   $request->estado;
        $room->num_camas        =   $request->num_camas;
        $room->precio_base      =   $request->precio_base;
        $room->max_ocupantes    =   $request->max_ocupantes;
        $room->terraza          =   $request->terraza ? True : False;
        $room->save();
        return redirect()->route('rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }

    public function checkAvailableRooms(Request $request)
    {
        $this->validate($request, [
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required',
            'numero_camas'  =>  'required',
            'terraza'       =>  '',
            'bookingId'     => ''
        ]);

        $fechaEntrada   =   $request->fecha_entrada;
        $fechaSalida    =   $request->fecha_salida;
        $numeroCamas    =   $request->numero_camas;
        if (isset($request->terraza)) {
            $terraza = 1;
        } else {
            $terraza = 0;
        }

        $objFechaEntrada = Carbon::parse($fechaEntrada);
        $objFechaSalida = Carbon::parse($fechaSalida);
        $fechaEntradaComparada = DB::table('booking_room')
            ->select(DB::raw('DATEDIFF('."'".Carbon::now()->toDateString()."'".', '."'".$objFechaEntrada->toDateString()
                ."'".') AS diferencia'))->first();
        $ambasComparadas = DB::table('booking_room')
            ->select(DB::raw('DATEDIFF('."'".$objFechaEntrada->toDateString()."'".', '."'".$objFechaSalida->toDateString()
                ."'".') AS diferencia'))->first();

        if (0 < $fechaEntradaComparada->diferencia) {

           if (isset($request->bookingId)) {

               $id = $request->bookingId;
               return view('paginas/clientes/rooms/filter', compact('id'));

           } else {

               return view('paginas/clientes/rooms/filter');

           }

        } elseif (0 <= $ambasComparadas->diferencia) {

            if (isset($request->bookingId)) {

                $id = $request->bookingId;
                return view('paginas/clientes/rooms/filter', compact('id'));

            } else {

                return view('paginas/clientes/rooms/filter');

            }

        } else {

            $params = [$fechaEntrada, $fechaSalida, $numeroCamas, $terraza];
            if (isset($request->bookingId)) {
                $id = $request->bookingId;
                $params = [$fechaEntrada, $fechaSalida, $numeroCamas, $terraza, $id];
            }

            $roomsListadas = Room::select('*')
                ->where('rooms.numero_camas','>=',DB::raw($numeroCamas))
                ->where('rooms.terraza','=',DB::raw($terraza))
                ->where('rooms.estado','LIKE', DB::raw('\'disp\''))->get();

            $roomsFuera = DB::table('booking_room')->select('*')
                ->where(DB::raw(0), '<=', DB::raw('(SELECT DATEDIFF(`booking_room`.`fecha_entrada`, '."'".$objFechaEntrada->toDateString()."'".'))'))
                ->where(DB::raw(0), '>=', DB::raw('(SELECT DATEDIFF(`booking_room`.`fecha_salida`, '."'".$objFechaSalida->toDateString()."'".'))'))
                ->get();

            $roomsEntradaDentro = DB::table('booking_room')->select('*')
                ->where(DB::raw(0), '<=', DB::raw('(SELECT DATEDIFF(`booking_room`.`fecha_entrada`, '."'".Carbon::parse($fechaEntrada)->toDateString()."'".'))'))
                ->where(DB::raw(0), '>', DB::raw('(SELECT DATEDIFF(`booking_room`.`fecha_salida`, '."'".Carbon::parse($fechaEntrada)->toDateString()."'".'))'))
                ->get();

            $roomsSalidaDentro = DB::table('booking_room')->select('*')
                ->where(DB::raw(0), '<', DB::raw('(SELECT DATEDIFF(`booking_room`.`fecha_entrada`, '."'".Carbon::parse($fechaSalida)->toDateString()."'".'))'))
                ->where(DB::raw(0), '>=', DB::raw('(SELECT DATEDIFF(`booking_room`.`fecha_salida`, '."'".Carbon::parse($fechaSalida)->toDateString()."'".'))'))
                ->get();

            $availableRooms = [];

            foreach ($roomsListadas as $roomListada) {

                $ocupada = false;

                foreach ($roomsFuera as $roomFuera) {

                    if ($roomListada->id == $roomFuera->room_id) {
                        $ocupada = true;
                    }

                }

                foreach ($roomsEntradaDentro as $roomEntradaDentro) {

                    if ($roomListada->id == $roomEntradaDentro->room_id) {
                        $ocupada = true;
                    }

                }

                foreach ($roomsSalidaDentro as $roomSalidaDentro) {

                    if ($roomListada->id == $roomSalidaDentro->room_id) {
                        $ocupada = true;
                    }

                }

                if (!$ocupada) {
                    $availableRooms[] = $roomListada;
                }

            }

            $prms = [$params, $availableRooms];

            return view('paginas/clientes/rooms/index', compact('prms'));

        }
    }

    public function filter()
    {
        return view('paginas/clientes/rooms/filter');
    }

    public function filterWithId(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $id = $request->id;

        return view('paginas/clientes/rooms/filter', compact('id'));
    }

}
