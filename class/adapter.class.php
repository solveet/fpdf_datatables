<?php
class Adapter
{	
	public static function getUsers(){
		$mysqli = new mysqli('127.0.0.1', 'root', '', 'users');
		$sql = "SELECT * FROM users";
		if ($resultado = $mysqli->query($sql)) {
			return $resultado;
		}
		return [];
	}
}