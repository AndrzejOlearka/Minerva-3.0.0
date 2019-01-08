<?php

include "../core/database/iConnectionInfo.php";

Class Connection implements iConnectionInfo{

	public static function connectToMinervaGameDB(){

		try{
			return $pdo = new PDO (
				iConnectionInfo::HOST,
				iConnectionInfo::USER,
				iConnectionInfo::PASSWORD,
				iConnectionInfo::SETTINGS);
		}
		catch(PDOexception $error){
			echo $error->getMessage();
			exit('Warning! Database error! ');
		}

	}
	
}

?>
