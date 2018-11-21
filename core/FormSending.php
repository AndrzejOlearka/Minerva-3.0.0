<?php

// skrypt pokazujący, czy premium jest aktywne
// script that showing if premium is activated

class FormSending{

	public static function preventSendingData(){
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_SESSION['postdata'] = $_POST;
			unset($_POST);
			header("Location: ".$_SERVER['PHP_SELF']);
			exit;
		}	
	}
}

?>