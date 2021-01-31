<?php
include("../dbConnection.php");
//get pdo
$pdo = returnPDO();
//sql statement
$sqlStatement = "SELECT m.mov_id, m.mov_title_1, m.mov_year, g.gen_name, p.per_fname, p.per_lname FROM movie m LEFT JOIN genre g 
 ON g.gen_id = m.gen_id LEFT JOIN MOVIE_DIRECTOR md
 ON m.mov_id = md.mov_id LEFT JOIN person p ON md.per_id = p.per_id";
//$sqlStatement = "SELECT * from genre g natural join movie m natural join movie_director md natural join person p";
// variables
$array = [];
$start = false;
$end = false;
$arrayToExecute = [];
//select sql statements
if($_POST['start'] != ""){
    $sqlStatement = $sqlStatement . " WHERE m.mov_year > ?";
    $start = true;
}
if($_POST['end'] != ""){
    if($start){
        $sqlStatement = $sqlStatement . " AND m.mov_year < ?";
    } else {
        $sqlStatement = $sqlStatement . " WHERE m.mov_year < ?";
    }
    $end = true;
}
// select variables
if($start && !$end) {
    $arrayToExecute = array($_POST['start']);
} else if ($start && $end) {
    $arrayToExecute = array($_POST['start'], $_POST['end']);
}else if($end && !$start){
    $arrayToExecute = array($_POST['end']);
}
// output json
outputJSON($pdo, $sqlStatement, $arrayToExecute);