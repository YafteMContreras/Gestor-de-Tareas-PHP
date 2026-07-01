<?php
public class Tarea{
	public function __construct(
		public readonly int $id = 0,
		public string $titulo,
		public int $prioridad = 1,
		public bool $completada = false
	) {}

	public class textoPrioridad() : string {
		return match($this->prioridad){
			1 => "Alta", 2 => "Media", 3 => "Baja",
		};
	}
}


?>
