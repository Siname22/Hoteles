<x-zz.base2>

    <x-slot:titulo>Editar Reserva de habitación</x-slot:titulo>
    <x-slot:encabezado>Modifica la reserva de habitación</x-slot:encabezado>

    <form action='{{ route('roomAssignments.update', $params['roomAssignment']) }}' method='post'>
        @method('put')
        @csrf

        <x-roomAssignments.campos :params='$params' />

        <br><br><input id='submit' type='submit' value='Editar reserva de habitación'/>
    </form>

    <form action='{{ route('roomAssignments.destroy', $params['roomAssignment']) }}' method='post'>
        @method('delete')
        <input type='submit' value='Eliminar Reserva de habitación'>
    </form><br>


</x-zz.base2>
