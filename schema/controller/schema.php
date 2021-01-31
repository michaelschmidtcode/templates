<?php
include("../dbConnection.php");
//get pdo
$pdo = returnPDO();
//sql statement
$sqlStatement = 'SHOW DATABASES';
// variables
$arrayToExecute = [];
// output json
outputJSON($pdo, $sqlStatement, $arrayToExecute);