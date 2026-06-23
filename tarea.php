<?php

// Crea arreglo multidimensional de tareas
$tareas = [["id" => 1, "titulo" => "Estudiar PHP", "estado" => "Completada", "prioridad" => 2],
	["id" => 2, "titulo" => "Realizar proyecto", "estado" => "Pendiente", "prioridad" => 1],
	["id" => 3, "titulo" => "Crear repositorio", "estado" => "Pendiente", "prioridad" => 3],
	["id" => 4, "titulo" => "Leer documentacion", "estado" => "Completada", "prioridad" => 2]];

// Agrega texto de prioridad
foreach ($tareas as &$tarea){
	$tarea["textoPrioridad"] = match($tarea["prioridad"]){
		1 => "Alta",
		2 => "Media",
		3 => "Baja",
	};
}

unset($tarea);

// Ordena el arreglo por prioridad ascendente
usort($tareas, fn($a, $b) => $a["prioridad"] <=> $b["prioridad"]);
//var_dump($tareas);

// Separa la lista en completadas y pendientes
$completadas = array_filter($tareas, fn($a) => $a["estado"] === "Completada");
$completadas = array_values($completadas);
var_dump($completadas);

$pendientes = array_filter($tareas, fn($a) => $a["estado"] === "Pendiente");
$pendientes = array_values($pendientes);
//var_dump($pendientes);

// Imprime las listas
echo "Tareas completadas: " . count($completadas) . "\n";
foreach ($completadas as $tarea){
	echo "id: {$tarea['id']}; titulo: {$tarea['titulo']}; prioridad: {$tarea['textoPrioridad']}\n";
}

echo "Tareas pendientes: " . count($pendientes) . "\n";
foreach ($pendientes as $tarea){
	echo "id: {$tarea['id']}; titulo: {$tarea['titulo']}; prioridad: {$tarea['textoPrioridad']}\n";
}

?>
