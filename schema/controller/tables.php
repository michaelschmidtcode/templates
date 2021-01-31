<?php
include("../dbConnection.php");
//get pdo
$pdo = returnPDO($_POST['database']);
//sql statement
$sqlStatement = 'SHOW TABLES';
// variables
$arrayToExecute = [];
// output json
outputJSON($pdo, $sqlStatement, $arrayToExecute);