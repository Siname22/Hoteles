<label for='fecha_entrada'>Fecha de entrada: </label>
<input type='text' id='fecha_entrada' name='fecha_entrada' value='{{ $booking->fecha_entrada ?? '' }}' /><br>

<label for='fecha_salida'>Fecha de salida: </label>
<input type='text' id='fecha_salida' name='fecha_salida' value='{{ $booking->fecha_salida ?? '' }}' /><br>

<label for='precio'>Precio: </label>
<input type='text' id='precio' name='precio' value='{{ $booking->precio ?? '' }}' /><br>

<label for='observacion'>Observación: </label>
<input type='text' id='observacion' name='observacion' value='{{ $booking->observacion ?? '' }}' /><br><br>

<label for='client_id'>Cliente: </label>
<select id='client_id' name='client_id'>
    <optgroup label='Clientes'>
        @foreach($clients as $client)
            <option @selected($client->id == ($booking->client_id ?? '')) value='{{ $client->id }}'> {{ $client->nombre }}</option>
        @endforeach
    </optgroup>
</select>
