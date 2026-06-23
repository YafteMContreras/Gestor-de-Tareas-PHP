<?php
// Función que crea tareas
function crearTarea(string $titulo, int $prioridad = 1, bool $completada = false) : array{
	return["titulo" => $titulo, "prioridad" => $prioridad, "completada" => $completada];
}

$prueba = crearTarea("Prueba 3", 2, true);

//var_dump($prueba);

$prioridadMaxima = 1;

// Closure que filtra de acuerdo a una prioridad maxima
$filtrar = function(array $tarea) use (&$prioridadMaxima) : bool{
	return $tarea["prioridad"] >= $prioridadMaxima;
};

var_dump($filtrar($prueba));

// Convierte el closure en una arrow function
$flecha = fn($tarea) => $tarea["prioridad"] >= $prioridadMaxima;

var_dump($flecha($prueba));
?>
