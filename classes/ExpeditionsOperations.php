<?php

require_once "../classes/CommonOperations.php";

	abstract class ExpeditionsOperations extends CommonOperations{
		
		protected function getExpeditionNumber(){
			return $expeditionNumber = $this->getTaskNumber('expedition_number', 'expeditions_data');
		}
		
		protected function getDeincrementationedExpeditionNumber(){
			$expeditionNumber = $this->getExpeditionNumber();
			return $expeditionNumber = $expeditionNumber - 1;
		}
		
		protected function getExpeditionEndTime(){
			$dateTimeFactory = require "../classes/DateTimeInfo.php";
			return $expeditionEndTime = DateTimeInfo::getDateTime('expeditions_data', 'expedition_end');
		}					
		
		protected function getMinimumPrizeArray(){
			return $minPrize = [5, 4, 8, 8, 6, 8, 6, 3, 2, 1, 40, 5];
		}
		
		protected function getMaximumPrizeArray(){
			return $maxPrize = [10, 12, 16, 18, 12, 12, 12, 6, 3, 2, 60, 15];
		}
		
		protected function getPremiumPrizeArray(){
			return $premMaxPrize = [15, 16, 24, 24, 18, 18, 8, 4, 3, 80, 25];
		}
		
		protected function getExpArray(){
			return $exp = [200, 400, 750, 1400, 1900, 3700, 14000, 14000, 14000, 26000, 50000, 50000];
		}
		
		protected function getMineralsNamesArray(){
			return $mineralName = [
				'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes',
				'emeralds', 'rubies', 'sapphires', 'diamonds', 'gold', 'silver'
			];
		}
		protected function getPrizeInfoArray(){
			return $mineralNamePrizeInfo = [
				'bursztynów', 'agatów', 'malachitów', 'turkusów', 'ametystów', 'topazów',
				'szmaragdów', 'rubinów', 'szafirów', 'diamentów', 'zlota', 'srebra'
			];
		}		
			
			
			


	}

?>
