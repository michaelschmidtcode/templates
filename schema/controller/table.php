<?php
include("../dbConnection.php");
//get pdo
$pdo = returnPDO($_POST['database']);
//sql statement
$sqlStatement = 'DESCRIBE ' . $_POST['table'];
// variables
$arrayToExecute = [];
// output json
outputJSON($pdo, $sqlStatement, $arrayToExecute);