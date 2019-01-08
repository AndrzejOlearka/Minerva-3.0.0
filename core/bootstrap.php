<?php
if(isset($_SESSION['logged'])){
	$userName = $_SESSION['user'];  
}

require_once 'database/Connection.php';
require_once 'database/Querybuilder.php';


return new Querybuilder(
  Connection::connectToMinervaGameDB()
);

?>
