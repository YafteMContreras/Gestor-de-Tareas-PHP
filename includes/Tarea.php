<?php
class Tarea implements Validable {
	public function __construct(
		public string $titulo,
		public readonly int $id = 0,
		public int $prioridad = 1,
		public bool $completada = false
	) {}

	public function textoPrioridad() : string {
		return match($this->prioridad){
			1 => "Alta", 2 => "Media", 3 => "Baja",
		};
	}

	public function esValido() : bool {
		return preg_match('/^[\w]{3,}/',$this->titulo);
	}
}


?>
