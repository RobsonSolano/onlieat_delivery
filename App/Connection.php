<?php

namespace App;

class Connection {

	public static function getDb() {
		try {

			$conn = new \PDO(
				"mysql:host=HOST;dbname=DATABASE;charset=utf8",
				"USER",
				"PASS" 
			);

			return $conn;

		} catch (\PDOException $e) {
			
		}
	}
}
