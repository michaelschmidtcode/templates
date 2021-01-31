<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "SELECT * FROM movie m ORDER BY m.mov_title_1 ASC";
// output json
outputJSON($pdo, $sqlStatement, []);