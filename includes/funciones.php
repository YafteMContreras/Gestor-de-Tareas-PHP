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

?>
