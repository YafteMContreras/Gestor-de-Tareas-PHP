class Database {
	private static ?PDO $pdo = null;

	private function __construct() {}	// Impide instanciar directamente

	public static function obtenerConexión(): PDO {
		if (self::$pdo === null){
			$dsn = 'mysql:host=' . DB_HOST . ';dbname= ' . DB_NAME . ';charset=utf8mb4';
			self::$pdo = new PDO($dsn,DB_USER,DB_PASS,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
			);
		}
		return self::$pdo;
	}

}
