<?php
class ContadorTareas{
	private static int $total = 0;

	public static function incrementar() : void {
		self::$total++;
	}

	public static function obtenerTotal() : int {
		return self::$total;
	}
}

?>
