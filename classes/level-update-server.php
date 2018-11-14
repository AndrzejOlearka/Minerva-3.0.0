<?php

	// obiekt pozwalający na awans gracza od 1 do 10 levela
	// level advancing from 1 to 10

	class Advance{

		function updateLevel (){
			$query = require '../core/bootstrap.php';
			$data = $query->select("SELECT * FROM user_data WHERE user = '$userName'");

			if($data['level'] == 1 && $data['exp']  > 1000 && $data['exp'] < 4999){
				$query->update("UPDATE user_data SET level = '2' WHERE user = '$userName'");
				$_SESSION['advance_2_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 2 level!</div><br />';
			}
			else if($data['level'] == 2 && $data['exp']  > 5000 && $data['exp'] < 9999){
				$query->update("UPDATE user_data SET level = '3' WHERE user = '$userName'");
				$_SESSION['advance_3_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 3 level!</div><br />';
			}
			else if($data['level'] == 3 && $data['exp']  > 10000 && $data['exp'] < 24999){
				$query->update("UPDATE user_data SET level = 4 WHERE user = '$userName'");
				$_SESSION['advance_4_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 4 level!</div><br />';
			}
			else if($data['level'] == 4 && $data['exp']  > 25000 && $data['exp'] < 49999){
				$query->update("UPDATE user_data SET level = 5 WHERE user = '$userName'");
				$_SESSION['advance_5_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 5 level!</div><br />';
			}
			else if($data['level'] == 5 && $data['exp']  > 50000 && $data['exp'] < 99999){
				$query->update("UPDATE user_data SET level = 6 WHERE user = '$userName'");
				$_SESSION['advance_6_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 6 level!</div><br />';
			}
			else if($data['level'] == 6 && $data['exp']  > 100000 && $data['exp'] < 249999){
				$query->update("UPDATE user_data SET level = 7 WHERE user = '$userName'");
				$_SESSION['advance_7_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 7 level!</div><br />';
			}
			else if($data['level'] == 7 && $data['exp']  > 250000 && $data['exp'] < 499999){
				$query->update("UPDATE user_data SET level = 8 WHERE user = '$userName'");
				$_SESSION['advance_8_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 8 level!</div><br />';
			}
			else if($data['level'] == 8 && $data['exp']  > 500000 && $data['exp'] < 999999){
				$query->update("UPDATE user_data SET level = 9 WHERE user = '$userName'");
				$_SESSION['advance_9_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 9 level!</div><br />';
			}
			else if($data['level'] == 9 && $data['exp']  > 1000000) {
				$query->update("UPDATE user_data SET level = 10 WHERE user = '$userName'");
				$_SESSION['advance_10_level'] = '<br /><div class="success col-10 col-sm-8 col-lg-6 offset-1 offset-sm-2 offset-lg-3">
				<span style="color:#ffcc00">GRATULACJE!!!</span><br />Awansowałeś właśnie na 10 level!</div><br />';
			}
		}
	}

	$updateLevel = new Advance();
	$updateLevel->updateLevel();

	?>
