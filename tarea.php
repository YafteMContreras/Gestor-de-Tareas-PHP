<?php
// Función que crea tareas
function crearTarea(string $titulo, int $prioridad = 1, bool $completada = false) : array{
	static $id = 0;
        $tarea = ["id" => $id, "titulo" => $titulo, "prioridad" => $prioridad, "completada" => $completada];
	$id++;
	return $tarea;
}

$tareas = [crearTarea("Estudiar PHP", 2), crearTarea("Terminar proyecto"), crearTarea("Leer documentación", 3, true)];

var_dump($tareas);


// Función para texto de prioridad
function textoPrioridad(int $prioridad) : string{
	return match($prioridad){
		1 => "Alta",
		2 => "Media",
		3 => "Baja",
	};
}

// Función que imprime tareas
function imprimeTareas(array $array, string $texto, callable $textoPrioridad) : void {
	echo sprintf("%s: %d\n", $texto, count($array));
	foreach ($array as $tarea){
		echo "titulo: {$tarea['titulo']}; prioridad: " . $textoPrioridad($tarea['prioridad']) . "\n";

	}
}

// Ordena el arreglo por prioridad ascendente
usort($tareas, fn($a, $b) => $a["prioridad"] <=> $b["prioridad"]);
//var_dump($tareas);

// Separa la lista en completadas y pendientes
$completadas = array_filter($tareas, fn($a) => $a["completada"] === true);
$completadas = array_values($completadas);
var_dump($completadas);

$pendientes = array_filter($tareas, fn($a) => $a["completada"] === false);
$pendientes = array_values($pendientes);
var_dump($pendientes);

// Imprime las listas
imprimeTareas($completadas, "Tareas completadas", textoPrioridad(...));
imprimeTareas($pendientes, "Tareas pendientes", textoPrioridad(...));

?>
