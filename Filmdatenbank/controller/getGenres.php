<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "SELECT * FROM genre g";
// output json
outputJSON($pdo, $sqlStatement, []);