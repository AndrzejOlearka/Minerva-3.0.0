<?php

		class DataGenerator {

			public $query;
			protected $table;

			public function __construct(){
				$query = $this->query;
			}
			
			public function getData($table){
				$this->query = require '../core/bootstrap.php';				
				$data = $this->query->select("SELECT * FROM " . $table . " WHERE user = '$userName'");
				return $data;		
			}
		}
		
		class DataRowGenerator extends DataGenerator {
			
			protected $row;
			
			public function getDataRow($table, $row){
				$this->query = require '../core/bootstrap.php';				
				$data = $this->query->select("SELECT * FROM " . $table . " WHERE user = '$userName'");
				return $data[$row];		
			}			
		}

?>
