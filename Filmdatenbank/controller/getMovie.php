<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "SELECT * FROM movie m WHERE m.mov_id = ?";
// output json
outputJSON($pdo, $sqlStatement, [$_POST['id']]);