<?php
$id = 1;
$titulo = "Estudiar PHP";
$completada = false;
$prioridad = 1; // 1 = alta, 2 = media, 3 = baja


$estado = match(true){
	$completada === true => "Completada",
	default => "Pendiente",
};

$textoPrioridad = match($prioridad){
	1 => "Alta",
	2 => "Media",
	3 => "Baja",
	default => "ERROR, REVISAR PRIORIDAD",
};

echo "Tarea #$id: $titulo\n";
echo "Estado: $estado\n";
echo "Prioridad: $textoPrioridad\n";

?>
