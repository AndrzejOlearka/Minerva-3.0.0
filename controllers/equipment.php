<?php

require_once '../views/partials/logged-checking.php';
require '../classes/equipment-amount.php';
$updateLevel = require '../classes/level-update-server.php';

require '../classes/equipment-server.php';

	for($nr = 0; $nr<=20; $nr++){
		if(isset($_POST["insert$nr"])){
			$bursztyny = new Equipment;
			$bursztyny->sell($nr);
		}
	}

require_once '../sessions/equipment-sessions.php';
$equipmentSession = new EquipmentSessions();

require '../views/equipment.php';