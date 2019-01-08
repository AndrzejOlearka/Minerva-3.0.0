<?php	

require "../classes/DataGenerator.php";
require "../classes/CommonOperations.php";

abstract class AccountOperations extends CommonOperations{

	public function __construct(){
		parent::__construct();
		$this->dataRowGenerator = new DataRowGenerator();				
	}

	protected function getCurrentDate(){
		$dateTime = new DateTime();
		return $dateTime = $dateTime->format('Y-m-d H:i:s');
	}
	
	protected function getDateTimeDiff($data1, $data2){
		$dateTime = new DateTime();
		$dateTime->format('Y-m-d H:i:s');
		$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->dataRowGenerator->getDataRow($data1, $data2));
		$diffTime = $dateTime->diff($endTime);
		return $diffTime;
	}
	
	protected function getDateTime($data1, $data2){
		return $endTime = DateTime::createFromFormat('Y-m-d H:i:s', $this->dataRowGenerator->getDataRow($data1, $data2));
	}
	
}

?>
