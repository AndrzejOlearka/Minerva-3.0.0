<?php

$userName = $_SESSION['user'];  

require_once 'database/connection.php';
require_once 'database/query-builder.php';

return new Querybuilder(
  Connection::connectToMinervaGameDB()
);

?>
