<?php

Interface Tasks{

}

abstract class Expeditions implements Tasks {
		
	abstract protected function initiateExpedition();
	abstract protected function getExpeditionEndTime();
	abstract protected function stopExpedition();
	abstract protected function showExpedtionInfo();
}

abstract class Trips implements Tasks {
	
}

abstract class Missions implements Tasks {
	
}

?>
