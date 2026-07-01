<?php
class ContadorTareas{
	public static function incrementar() : void {
		self::$total++;
	}

	public static function obtenerTotal() : int {
		return self::$total;
	}
}

?>
