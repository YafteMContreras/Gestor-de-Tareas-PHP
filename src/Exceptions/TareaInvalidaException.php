<?php
class TareaInvalidaException extends RuntimeException {
	public function __construct(string $titulo) {
		parent::__construct("Titulo invalido: '$titulo' - minimo 3 caracteres");
	}

}




?>
