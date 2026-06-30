<?php
require_once __DIR__ . '/config/config.php';

require_once __DIR__ . '/includes/funciones.php';
require_once __DIR__ . '/includes/header.php';

$tareas = [crearTarea("Estudiar PHP", validarTitulo(...), 2), crearTarea("Terminar proyecto", validarTitulo(...)), crearTarea("Leer documentación", val>
$tareas = array_filter($tareas);

// Implementa lógica de registro de tareas
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Sanitiza los datos
        $tarea_titulo = htmlspecialchars($_POST['titulo'] ?? '', ENT_QUOTES, 'UTF-8');
        $tarea_prioridad = (int)$_POST['prioridad'];

        if ($tarea_prioridad < 1 || $tarea_prioridad > 3){
                echo "ERROR: Debe seleccionar un valor para la prioridad\n";
        }else{
                $nuevaTarea = crearTarea($tarea_titulo, validarTitulo(...), $tarea_prioridad);
                if ($nuevaTarea !== []){
                        $tareas[count($tareas)] = $nuevaTarea;
                }
        }
}

// Ordena el arreglo por prioridad ascendente
usort($tareas, fn($a, $b) => $a["prioridad"] <=> $b["prioridad"]);

// Separa la lista en completadas y pendientes
$completadas = array_filter($tareas, fn($a) => $a["completada"] === true);
$completadas = array_values($completadas);

$pendientes = array_filter($tareas, fn($a) => $a["completada"] === false);
$pendientes = array_values($pendientes);

// Imprime las listas
imprimeTareas($completadas, "Tareas completadas", textoPrioridad(...));
imprimeTareas($pendientes, "Tareas pendientes", textoPrioridad(...));

?>
