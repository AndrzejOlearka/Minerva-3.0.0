<?php

// funkcja pokazująca ilość minerałów w ekwipunku
// function showing the amount of minerals in the equipment

	function amount($mineral)
	{
		$connect = require "../core/database/connect.php";
		$userName = $_SESSION['user'];

		$equipmentQuery = $dataBase->prepare
			("SELECT * FROM user_data JOIN basic_equipment JOIN rare_equipment ON user_data.user = basic_equipment.user
			WHERE user_data.user = '$userName' AND basic_equipment.user = '$userName' AND rare_equipment.user = '$userName'");
		$equipmentQuery->execute();
		$amount = $equipmentQuery->fetch();
		return $amount[$mineral];
	}

?>
