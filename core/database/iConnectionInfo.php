<?php


interface iConnectionInfo{
	
	const HOST = "mysql:host=localhost;dbname=minerva_game_db";
	const USER = "root";
	const PASSWORD = "";
	const SETTINGS = [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	
	
}

?>
