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
