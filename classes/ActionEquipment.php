<?php

require_once "../classes/Actions.php";
require '../classes/EquipmentSellingValidator.php';
require '../classes/EquipmentSellingFinalizator.php';

	class ActionEquipment extends Equipment{

		public function sellMinerals(){
			for($nr = 0; $nr<=20; $nr++){
				if(isset($_POST["insert$nr"])){
					$sellingMineralsAmount = new EquipmentSellingValidator();
					$sanitization = $sellingMineralsAmount ->sanitizeInsertedNumber($nr);
					$validation = $sellingMineralsAmount ->validateInsertedNumber($nr);
					if($sanitization == true && $validation == true){
						$equipmentSellingFinalizator = new EquipmentSellingFinalizator();
						$equipmentSellingFinalizator->executeSelling($nr);
					}
				}
			}
		}
	}

?>
