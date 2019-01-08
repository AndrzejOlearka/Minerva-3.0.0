<?php

require_once "../classes/Actions.php";
require '../classes/RegistrationRequest.php';

	class ActionRegistration extends RegistrationPanel{

		public function register(){
			if(isset($_POST['nick'])){
				$registration = new RegistrationRequest();
				if($registration->initiateRegistration()){
					$registration->finalizeRegistration();
				}
			}
		}
	}

?>
