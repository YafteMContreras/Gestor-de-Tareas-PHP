<?php
$tareas = [
    ["id" => 1, "titulo" => "Estudiar PHP",      "completada" => false, "prioridad" => 1],
    ["id" => 2, "titulo" => "Hacer ejercicio",   "completada" => true,  "prioridad" => 2],
    ["id" => 3, "titulo" => "Leer documentación","completada" => false, "prioridad" => 1],
];

echo $tareas[1]["titulo"];  // "Hacer ejercicio"

$numeros = [3, 1, 4, 1, 5, 9, 2, 6];

// Ordenar
sort($numeros);                    // ordena indexado (modifica el original)
usort($tareas, fn($a, $b) => $a["prioridad"] <=> $b["prioridad"]); // orden personalizado

// Buscar y filtrar
in_array("Leer", $nombres);        // true/false
array_search("Leer", $nombres);    // devuelve el índice, o false si no existe

// Transformar
$titulos = array_map(fn($t) => $t["titulo"], $tareas);         // como stream().map() en Java
$pendientes = array_filter($tareas, fn($t) => !$t["completada"]); // como stream().filter()
$total = array_reduce($numeros, fn($carry, $n) => $carry + $n, 0); // como stream().reduce()

// Slicing y combinación
$slice = array_slice($tareas, 0, 2);   // primeros 2 elementos
$combinado = array_merge($arr1, $arr2);
?>
