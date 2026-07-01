<?php
class ContadorTareas(){
	public function __construct(
		private static int $total,
	) {}

	public static function incrementar() : void {
		self::$total++;
	}

	public static function obtenerTotal() : int {
		return self::$total;
	}
}

?>
