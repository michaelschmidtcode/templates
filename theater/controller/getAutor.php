<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "SELECT * FROM person p where p.rol_id = 4";
// output json
outputJSON($pdo, $sqlStatement, []);