<?php
// Función que imprime tareas
function imprimeTareas(array $array, string $texto) : void {
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
                                <td><?php echo sprintf("%03d", $tarea->id) ?></td>
                                <td><?php echo sprintf("%-20s", $tarea->titulo) ?></td>
                                <td><?php echo sprintf("%-10s", $tarea->textoPrioridad()) ?></td>
                </tr>
                        <?php endforeach; ?>
        </table>
<?php
}

?>
