<?php

	abstract class CommonOperations{
	
		protected $query;
		protected $userName;
	
		public function __construct(){
			$this->query = require '../core/bootstrap.php';
			if(isset($_SESSION['user'])){
				$this->userName = $_SESSION['user'];  
			}
		}
		
		protected function getCurrentDate(){
			$dateTime = new DateTime();
			return $dateTime = $dateTime->format('Y-m-d H:i:s');
		}
		
		protected function checkPremiumStatus(){
			$PremiumEndTime = $this->query->selectBindValue("SELECT premium_end FROM user_data WHERE user = ?", $bindedValues = [$this->userName]);
			$dateTime = new DateTime();
			$dateTime->format('Y-m-d H:i:s');
			$premEndTime = DateTime::createFromFormat('Y-m-d H:i:s', $PremiumEndTime['premium_end']);
			return $premEndTime > $dateTime ? true : false;
		}

		protected function getTaskNumber($taskNumber, $taskData){
			$TaskNumber = $this->query->selectBindValue("SELECT ".$taskNumber." 
				FROM  ".$taskData." 
				WHERE user = ?",
				$array = [$this->userName]);
			return $TaskNumber[$taskNumber];
		}		
		
		protected function addGuildExp($idGuild, $exp){
			require '../classes/GuildExpGenerator.php';
			if($idGuild !== 0){			
				GuildExpGenerator::addGuildExp($exp);
			}	
		}
		
		protected function rollRandomNumbers($firstCollection, $secondCollection){
			return $rand = rand($firstCollection, $secondCollection);
		}	
	}

?>
