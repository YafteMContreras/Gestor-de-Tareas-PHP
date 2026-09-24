class Database {
	private static ?PDO $pdo = NULL;

	public static function __construct() {}	// Permite insancias directamente

	public static function obtenerConexión(): PDO {
		if (self::$pdo === NULL){
			$pdo = new PDO("mysql:host=localhost;dbname=gestorTareas;charset=utf8mb4",
			"usuario",
			"contraseña",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
			);
		}
		return self::$pdo;
	}

}
