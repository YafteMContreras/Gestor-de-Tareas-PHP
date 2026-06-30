<?php
require_once __DIR__ . '/includes/header.php';
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

// var_dump($tareas);

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
?>
	<h2><?php echo sprintf("%s: %d", $texto, count($array)) ?></h2>
	<table>
		<tr>
			<th><?php echo sprintf("%-3s", "Id") ?></th>
			<th><?php echo sprintf("%-20s", "Titulo") ?></th>
			<th><?php echo sprintf("%-10s", "Prioridad") ?></th>
		</tr>
			<?php foreach ($array as $tarea):?>
		<tr>
				<td><?php echo sprintf("%03d", $tarea['id']) ?></td>
				<td><?php echo sprintf("%-20s", $tarea['titulo']) ?></td>
				<td><?php echo sprintf("%-10s", $textoPrioridad($tarea['prioridad'])) ?></td>
		</tr>
			<?php endforeach; ?>
	</table>
<?php
}

// Ordena el arreglo por prioridad ascendente
usort($tareas, fn($a, $b) => $a["prioridad"] <=> $b["prioridad"]);
//var_dump($tareas);

// Separa la lista en completadas y pendientes
$completadas = array_filter($tareas, fn($a) => $a["completada"] === true);
$completadas = array_values($completadas);
// var_dump($completadas);

$pendientes = array_filter($tareas, fn($a) => $a["completada"] === false);
$pendientes = array_values($pendientes);
// var_dump($pendientes);

// Imprime las listas
imprimeTareas($completadas, "Tareas completadas", textoPrioridad(...));
imprimeTareas($pendientes, "Tareas pendientes", textoPrioridad(...));
?>
