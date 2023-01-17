<label for="nombre">Nombre: </label>
<input type="text" id="nombre" name="nombre" value="{{ $room->nombre ?? '' }}"/> <br>

<label for="tipo">Tipo </label>
<input type="text" id="tipo" name="tipo" value="{{ $room->tipo ?? '' }}"/> <br>

<label for="estado">Estado: </label>
<input type="text" id="estado" name="estado" value="{{ $room->estado ?? '' }}"/> <br>

<label for="num_camas">Numero de Camas: </label>
<input type="number" id="num_camas" name="num_camas" value="{{ $room->numero_camas ?? '' }}"/> <br>

<label for="precio_base">Precio Base: </label>
<input type="text" id="precio_base" name="precio" value="{{ $room->precio_base ?? '' }}"/> <br>


<label for="max_ocupantes">Maximo Ocupantes: </label>
<input type="number" id="max_ocupantes" name="max_ocupantes" value="{{ $room->max_ocupantes ?? '' }}"/> <br>

<label for="terraza">Terraza: </label>
<input type="checkbox" id="terraza" name="terraza" {{ $room->terraza ? 'checked' : '' }}/> <br>

