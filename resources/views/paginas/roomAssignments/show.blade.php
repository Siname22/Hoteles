<?php
    $tipo = $roomAssignment->room->tipo;
    if ($tipo == 'pr')
        $tipo = 'presidencial';

    $estado = $roomAssignment->room->estado;
    if ($estado == 'disp')
        $estado = 'disponible';
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
            <td>{{ $roomAssignment->room->nombre}}</td>

            <td>
                {{ $tipo }}
            </td>

            <td>
                {{ $estado }}
            </td>

            <td>
                {{ $roomAssignment->fecha_entrada }}
            </td>

            <td>
                {{ $roomAssignment->fecha_salida }}
            </td>

            <td>
                <form action='{{ route('roomAssignments.destroy', $roomAssignment) }}' method='post'
                      style='margin-top: 13px'>
                    @method('delete')
                    <input type='submit' value='Eliminar reserva'>
                </form>
            </td>

            <td>
                <button><a href='{{ route('roomAssignments.edit', $roomAssignment) }}' id='no_subrayado'>Editar
                        <br/>reserva</a></button>
            </td>
        </tr>

    </table>

    <br><br>
    <button><a href='{{ route('roomAssignments', $roomAssignment->booking_id) }}' id='no_subrayado'>Atrás</a></button>

</x-zz.base2>
