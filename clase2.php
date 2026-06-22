<?php
echo("Ejercicio 1:\n");
var_dump("abc" == 0);
var_dump("1abc" == 1);
var_dump([] == false);

$variable = $_GET['$inexistente'] ?? "Rojo";
var_dump($variable);

echo("Ejercicio 2:\n");
if ($variable === "Azul"){
	$valor = true;
}elseif ($variable === "Negro"){
	$valor = false;
}else{
	$valor = "Default";
}
var_dump($valor);

echo("Ejercicio 3:\n");
$variable = true;
$valor2 = match($variable){
	"Azul" => true,
	"Negro" => false,
	true => "prueba",
	default => "Default",
};
var_dump($valor2);

?>
