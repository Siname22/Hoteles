<label for="nombre">Nombre: </label>
<input type="text" id="nombre" name="nombre" value="{{ $client->nombre ?? '' }}"/> <br>

<label for="apellidos">Apellidos </label>
<input type="text" id="apellidos" name="apellidos" value="{{ $client->apellidos ?? '' }}"/> <br>

<label for="dni">DNI: </label>
<input type="text" id="dni" name="dni" value="{{ $client->dni ?? '' }}"/> <br>

<label for="email">Email: </label>
<input type="email" id="email" name="email" value="{{ $client->email ?? '' }}"/> <br>

<label for="telefono">Tlf: </label>
<input type="text" id="telefono" name="telefono" value="{{ $client->telefono ?? '' }}"/> <br>
