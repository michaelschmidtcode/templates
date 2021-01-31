<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "SELECT * FROM person p";
// output json
outputJSON($pdo, $sqlStatement, []);