class Database {
	private static ?PDO $pdo = null;

	private function __construct() {}	// Impide instanciar directamente

	public static function obtenerConexión(): PDO {
		if (self::$pdo === null){
			self::$pdo = new PDO('mysql:host=localhost;dbname=gestorTareas;charset=utf8mb4',
			"usuario",
			"contraseña",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
			);
		}
		return self::$pdo;
	}

}
