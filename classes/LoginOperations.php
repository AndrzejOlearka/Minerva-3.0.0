<?php

require_once "../classes/CommonOperations.php";

abstract class LoginOperations extends CommonOperations{

	protected function getBanForm($banEndTime){
		return $banForm = '
			<div class="error col-12 col-sm-10 col-lg-6 offset-sm-1 offset-lg-3">Wymagane jest podanie nowego nicku, przez niepoprawany nick jaki posiadałeś zostałeś zbanowany do '.$banEndTime.'.
				<form method="post" action="../controllers/login.php">
					<div class="form_registration_title col-sm-6 col-lg-4 offset-lg-4">Nowy nick:</div>
					<div class="form_registration_input col-6 offset-3"><input type="text" name="newNick"/></div>
					<div class="form_registration_input col-6 offset-3"><input type="submit" name="newNickConfirmed" value="potwierdź!"/></div>
					<div class="form_registration_input col-6 offset-3"><input type="submit" name="newNickAborted" value="anuluj!"/></div>
				</form>
			</div>';
	}
}

?>
