<label for="nombre">Nombre: </label>
<input type="text" id="nombre" name="nombre" value="{{ $employee->nombre ?? '' }}"/> <br>

<label for="apellidos">Apellidos </label>
<input type="text" id="apellidos" name="apellidos" value="{{ $employee->apellidos ?? '' }}"/> <br>

<label for="telefono">Tlf: </label>
<input type="text" id="telefono" name="telefono" value="{{ $employee->telefono ?? '' }}"/> <br>

<label for="dni">Rol: </label>
<input type="text" id="rol" name="rol" value="{{ $employee->rol ?? '' }}"/> <br>




