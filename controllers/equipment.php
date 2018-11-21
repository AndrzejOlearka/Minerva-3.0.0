<?php

require_once '../views/partials/logged-checking.php';

require '../classes/AmountMinerals.php';

require '../classes/EquipmentShop.php';

	for($nr = 0; $nr<=20; $nr++){
		if(isset($_POST["insert$nr"])){
			$soldMinerals = new EquipmentShop;
			$soldMinerals->sell($nr);
		}
	}
	
require '../core/FormSending.php';
FormSending::preventSendingData();

require_once '../sessions/equipment-sessions.php';
$equipmentSession = new EquipmentSessions();

require '../classes/Advance.php';
Advance::updateLevel();

require '../sessions/advance-sessions.php';
$advance = new LevelUpdateSession();

require '../views/equipment.php';


