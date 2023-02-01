<?php
    $tipo = $room_booking->room->tipo;
    if ($tipo == 'pr')
        $tipo = 'presidencial'
?>
<?php
    $estado = $room_booking->room->estado;
    if ($estado == 'disp')
        $estado = 'disponible'
?>

<x-zz.base2>

    <x-slot:titulo>Reserva de habitación</x-slot:titulo>
    <x-slot:encabezado>Detalles de reserva de habitación</x-slot:encabezado>

    <table id='tabla'>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Fecha de entrada</th>
        <th>Fecha de salida</th>
        <th>Eliminar</th>
        <th>Editar</th>

        <tr id='fila'>
            <td>{{ $room_booking->room->nombre}}</td>
            <td>{{ $tipo }}</td>
            <td>{{ $estado }}</td>
            <td>{{ $room_booking->fecha_entrada }}</td>
            <td>{{ $room_booking->fecha_salida }}</td>
            <td>
                <form action = '{{ route('room_bookings.destroy', $room_booking) }}' method = 'post' style='margin-top: 13px'>
                    @method('delete')
                    <input type = 'submit' value = 'Eliminar
reserva'>
                </form>
            </td>
            <td>
                <button><a href = '{{ route('room_bookings.edit', $room_booking) }}' id='no_subrayado'>Editar
                        <br/>reserva</a></button>
            </td>
        </tr>

    </table>

    <br><br><button><a href = '{{ route('room_bookings.index') }}' id='no_subrayado'>Atrás</a></button>

</x-zz.base2>
