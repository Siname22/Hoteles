<?php
$tipo = $roomBooking->room->tipo;
if ($tipo == 'pr')
    $tipo = 'Presidencial';

$estado = $roomBooking->room->estado;
if ($estado == 'disp')
    $estado = 'Disponible';
?>

<x-zz.base2>

    <x-slot:titulo>M2H - Detalles Habitación</x-slot:titulo>
    <x-slot:encabezado>DETALLES DE HABITACIÓN</x-slot:encabezado>

    <table id='tabla'>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Entrada</th>
        <th>Salida</th>
        <th>Eliminar</th>

        <tr id='fila'>
            <td>{{ $roomBooking->room->nombre}}</td>

            <td>
                {{ $tipo }}
            </td>

            <td>
                {{ $roomBooking->fecha_entrada }}
            </td>

            <td>
                {{ $roomBooking->fecha_salida }}
            </td>

            <td>
                <form action='{{ route('roomBookings.destroy', $roomBooking) }}' method='post'
                      style='margin-top: 13px'>
                    @method('delete')
                    <input type='submit' value='Eliminar' class='button'>
                </form>
            </td>

        </tr>

    </table>

    <br><br>
    @php $id = $roomBooking->id @endphp
    <form action="{{ route('roomBookings.returnToIndex', compact('id')) }}" method="get">
        <input type="submit" class="button" value="Atrás"/>
    </form>

</x-zz.base2>
