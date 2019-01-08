<?php

		class DataGenerator {

			protected $query;
			protected $userName;

			public function __construct(){
				$this->query = require '../core/bootstrap.php';
				$this->userName = $_SESSION['user'];  
			}
			
			public function getData($table){	
				$data = $this->query->selectBindValue("SELECT * FROM " . $table . " WHERE user = ?", $bindedValues = [$this->userName]);
				return $data;		
			}
		}
		
		class DataRowGenerator extends DataGenerator {
			
			protected $row;
			
			public function getDataRow($table, $row){			
				$data = $this->query->selectBindValue("SELECT * FROM " . $table . " WHERE user = ?", $bindedValues = [$this->userName]);
				return $data[$row];		
			}			
		}

?>
