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
  
    public function update($query){
	$statement = $this->pdo->prepare($query);
  	$statement->execute();
  }
  
  public function rows($query){
	$statement = $this->pdo->prepare($query);
  	$statement->execute();
  	$statement->fetch();
	return $statement->rowCount();
  }
  
}



?>
