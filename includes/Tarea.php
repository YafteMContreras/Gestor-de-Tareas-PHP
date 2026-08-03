<?php
require_once __DIR__ . '/includes/TareaInvalidaException.php';

class Tarea implements Validable {
	public function __construct(
		public string $titulo,
		public readonly int $id = 0,
		public int $prioridad = 1,
		public bool $completada = false
	) {
		if (!preg_match('/^[\w]{3,}/',$this->titulo){
			throw new TareaInvalidaException ("Titulo invalido");
		}
	}

	public function textoPrioridad() : string {
		return match($this->prioridad){
			1 => "Alta", 2 => "Media", 3 => "Baja",
		};
	}

}


?>
