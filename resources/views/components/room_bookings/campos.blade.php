<label for='room_id'>Habitación: </label>
<select id='room_id' name='room_id'>
    <optgroup label='Habitaciones'>
        @foreach($params['rooms'] as $room)
            <option @selected($room->id == ($params['room_booking']->room_id ?? '')) value='{{ $room->id }}'> {{ $room->nombre }}</option>
        @endforeach
    </optgroup>
</select><br>


<label for='booking_id'>Reserva: </label>
<select id='booking_id' name='booking_id'>
    <optgroup label='Reservas'>
        @foreach($params['bookings'] as $booking)
            <option @if(isset($params['room_booking']))
                        @disabled($booking->id != $params['room_booking']->booking->id)
                    @endif value='{{ $booking->id }}'> {{ $booking->codigo }}</option>
        @endforeach
    </optgroup>
</select><br>


<label for='fecha_entrada'>Fecha de entrada: </label>
<input type='text' id='fecha_entrada' name='fecha_entrada' value='{{ $params['room_booking']->fecha_entrada ?? '' }}'><br>

<label for='fecha_salida'>Fecha de salida: </label>
<input type='text' id='fecha_salida' name='fecha_salida' value='{{ $params['room_booking']->fecha_salida ?? '' }}'>
