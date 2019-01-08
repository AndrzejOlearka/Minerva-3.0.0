<?php

Interface Tasks{}

abstract class Expeditions implements Tasks {	
	abstract protected function initiateExpedition();
	abstract protected function getExpeditionEndTime();
	abstract protected function stopExpedition();
	abstract protected function showExpeditionInfo();
}

abstract class Trips implements Tasks {
	abstract protected function initiateTrip();
	abstract protected function getTripEndTime();
	abstract protected function stopTrip();
	abstract protected function showTripInfo();
}

abstract class Mines implements Tasks {
	abstract protected function buyMine();
	abstract protected function getDailyPrize();
	abstract protected function showDailyPrizeInfo();
}

abstract class Missions implements Tasks {
	abstract protected function executeMission();
}

?>
