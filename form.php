<?php
// Sanitiza los datos
$nombre = htmlspecialchars($_POST['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
$edad = (int)htmlspecialchars($_POST['edad'] ?? 0, ENT_QUOTES, 'UTF-8');

// Valida los datos
if ($nombre === ""){
	echo "ERROR: El nombre no debe estar vacio\n";
}else{
	echo sprintf("Nombre: %s\n", $nombre);
}

if ($edad < 1 || $edad > 120){
	echo "ERROR: Edad no valida, por favor verifique\n";
}else{
	echo sprintf("Edad: %d\n", $edad);
}

?>

<form method="POST" action="">
	<label for="nombre">Ingresa tu nombre: </label>
	<input type="TEXT" name="nombre">

	<label for="edad">Ingresa tu edad: </label>
	<input type="INT" name="edad">

	<button type="submit">Guardar</button>
</form>
