<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "UPDATE movie m SET m.mov_title_1 = ?, m.mov_title_2 = ?, m.mov_year = ?, m.gen_id = ? WHERE m.mov_id = ?";
$sqlStatementResponse = "SELECT * FROM movie m NATURAL JOIN genre g WHERE m.mov_id = ?";
// output json
outputJSON($pdo, $sqlStatement, [$_POST['mov_title_1'],$_POST['mov_title_2'],$_POST['mov_year'],$_POST['GENRE_gen_id'],$_POST['mov_id']], true);
outputJSON($pdo, $sqlStatementResponse, [$_POST['mov_id']]);
