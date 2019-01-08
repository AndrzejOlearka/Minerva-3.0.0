<?php

class Querybuilder{
  
	protected $pdo;

	public function __construct($pdo){
    $this->pdo = $pdo;
  }

	public function select($query){
	$statement = $this->pdo->prepare($query);
  	$statement->execute();
  	return $statement->fetch();
  }
  
    public function selectAll($query){
	$statement = $this->pdo->prepare($query);
  	$statement->execute();
  	return $statement->fetchAll();
  }
  

  
    public function rows($query){
	$statement = $this->pdo->prepare($query);
  	$statement->execute();
  	$statement->fetch();
	return $statement->rowCount();
  }
  
    public function update($query){
	$statement = $this->pdo->prepare($query);
  	$statement->execute();
  }
  
  	public function updateBindValue($query, $array){
		$statement = $this->pdo->prepare($query);
		$elements = sizeof($array);
		for($i = 1; $i <= $elements; $i++){
			$j = $i - 1;
			if(is_int($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_INT);
			}
			if(is_string($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_STR);
			}
		}
	$statement->execute();
  }
  
  	public function selectBindValue($query, $array){
		$statement = $this->pdo->prepare($query);
		$elements = sizeof($array);
		for($i = 1; $i <= $elements; $i++){
			$j = $i - 1;
			if(is_int($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_INT);
			}
			if(is_string($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_STR);
			}
		}
		$statement->execute();
		return $statement->fetch();
	  }
  
	public function selectAllBindValue($query){
		$statement = $this->pdo->prepare($query);
		$elements = sizeof($array);
		for($i = 1; $i <= $elements; $i++){
			$j = $i - 1;
			if(is_int($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_INT);
			}
			if(is_string($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_STR);
			}
		}
		$statement->execute();
		return $statement->fetchAll();
	  }
	  
	  public function countRowsBindValue($query, $array){
		$statement = $this->pdo->prepare($query);
		$elements = sizeof($array);
		for($i = 1; $i <= $elements; $i++){
			$j = $i - 1;
			if(is_int($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_INT);
			}
			if(is_string($array[$j]) == true){
				$statement->bindValue($i, $array[$j], PDO::PARAM_STR);
			}
		}
		$statement->execute();
		$statement->fetchAll();
		return $statement->rowCount();
	  }
	  
  }





?>
