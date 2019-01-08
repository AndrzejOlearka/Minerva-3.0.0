<?php

require_once '../views/partials/logged-checking.php';

require '../classes/AmountMinerals.php';

require '../classes/ActionEquipment.php';
$equipmentShop = new ActionEquipment();
$equipmentShop->sellMinerals();
	
require '../core/FormSending.php';
FormSending::preventSendingData();

require_once '../sessions/equipment-sessions.php';
$equipmentSession = new EquipmentSessions();

require '../classes/Advance.php';
Advance::updateLevel();

require '../sessions/advance-sessions.php';
$advance = new LevelUpdateSession();

require '../classes/DataGenerator.php';
$data = new DataRowGenerator();
$data = $data->getDataRow('user_data', 'level');

require '../views/equipment.php';


