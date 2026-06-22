<?php
echo("Ejercicio 1:\n");
$datos = ["nombre" => "Yafte", "edad" => 25, "lenguajeFav" => "PHP"];
var_dump($datos);
$datos["nacionalidad"] = "Mexicano";
var_dump($datos);

echo("Ejercicio 2:\n");
$tareas = [
    ["id" => 1, "titulo" => "Estudiar PHP",      "completada" => false, "prioridad" => 1],
    ["id" => 2, "titulo" => "Hacer ejercicio",   "completada" => true,  "prioridad" => 2],
    ["id" => 3, "titulo" => "Leer documentación","completada" => false, "prioridad" => 1],
];
$pendientes = array_filter($tareas, fn($a) => !$a["completada"]);
var_dump($pendientes);
$titulos = array_map(fn($a) => $a["titulo"], $tareas);
var_dump($titulos);

echo("Ejercicio 3:\n");
usort($tareas, fn($a, $b) => $a["prioridad"] <=> $b["prioridad"]);

var_dump($tareas);


?>
