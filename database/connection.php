<?php


Class Connection{

	public static function make(){

		try{
			return $pdo = new PDO ('mysql:host=localhost;dbname=minervabase', 'root', '', [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		}
		catch(PDOexception $error){
			echo $error->getMessage();
			exit('Warning! Database error! ');
		}

	}

}

?>
