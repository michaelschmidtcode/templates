<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql
$sqlStatement = "SELECT * FROM patients p";
// output json
outputJSON($pdo, $sqlStatement, []);