<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "INSERT INTO movie(mov_title_1,mov_title_2,mov_year,gen_id) VALUES (?,?,?,?)";
$sqlStatementResponse = "SELECT * FROM movie m NATURAL JOIN genre g";
// output json
if(outputJSON($pdo, $sqlStatement, [$_POST['mov_title_1'],$_POST['mov_title_2'],$_POST['mov_year'],$_POST['GENRE_gen_id']], true)){
    outputJSON($pdo, $sqlStatementResponse, []);
}
