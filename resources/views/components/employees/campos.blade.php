<label for="nombre">Nombre: </label>
<input type="text" id="nombre" name="nombre" value="{{ $employee->nombre ?? '' }}"/> <br>

<label for="apellidos">Apellidos </label>
<input type="text" id="apellidos" name="apellidos" value="{{ $employee->apellidos ?? '' }}"/> <br>

<label for="telefono">Tlf: </label>
<input type="text" id="telefono" name="telefono" value="{{ $employee->telefono ?? '' }}"/> <br>

<label for="rol">Rol: </label>
<select name="rol" id="rol">
    <option value="admin">Administrador</option>
    <option value="recep">Recepcion</option>
    <option value="RRHH">Recursos Humanos</option>
</select>




