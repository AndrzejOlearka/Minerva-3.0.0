<?php

// funkcja pokazująca ilość minerałów w ekwipunku
// function showing the amount of minerals in the equipment

class DataUser{

	public static function check($info)
	{
		$query = require '../core/bootstrap.php';
		$data = $query->select("SELECT * FROM user_data JOIN basic_equipment JOIN rare_equipment ON user_data.user = basic_equipment.user
			WHERE user_data.user = '$userName' AND basic_equipment.user = '$userName' AND rare_equipment.user = '$userName'");
		return $data[$info];
	}
}	
	

?>
