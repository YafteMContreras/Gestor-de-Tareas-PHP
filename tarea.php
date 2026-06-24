<?php
// Función que crea tareas
function crearTarea(string $titulo, callable $valida, int $prioridad = 1, bool $completada = false) : array{
	static $id = 0;
	if (!$valida($titulo)){
		echo "El titulo no debe estar vacío o tener menos de 3 caracteres\n";
		return [];
	}
        $tarea = ["id" => $id, "titulo" => $titulo, "prioridad" => $prioridad, "completada" => $completada];
	$id++;
	return $tarea;
}

$tareas = [crearTarea("Estudiar PHP", validarTitulo(...), 2), crearTarea("Terminar proyecto", validarTitulo(...)), crearTarea("Leer documentación", validarTitulo(...), 3, true)];
$tareas = array_filter($tareas);

var_dump($tareas);

// Función que valida titulos
function validarTitulo(string $titulo) : bool{
	return preg_match('/^[\w]{3,}/',$titulo);
}

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
	echo sprintf("%-3s %-20s %-10s\n", "id", "titulo", "prioridad");
	echo "-----------------------------------------------------------------------\n";
	foreach ($array as $tarea){
		echo sprintf("%03d %-20s %-10s\n", $tarea['id'], $tarea['titulo'], $textoPrioridad($tarea['prioridad']));

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
