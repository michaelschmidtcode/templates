<?php
include("../dbConnection.php");
//get pdo
$pdo = returnPDO();
//sql statement
$sqlStatement = 'SELECT p.id, p.firstname, p.lastname, pd.visit, d.title AS "diagnosis", ds.title AS "diseasearea"
  FROM patients p LEFT JOIN patientsdiagnoses pd ON p.id = pd.patients_id LEFT JOIN diagnoses d ON d.id = pd.diagnoses_id
  LEFT JOIN diseaseareas ds ON ds.id = d.diseaseareas_id';
// variables
$array = [];
$arrayToExecute = [];
// check if id is given
if($_POST["id"]){
    $sqlStatement = $sqlStatement . ' WHERE p.id = ?';
    array_push($arrayToExecute, $_POST["id"]);
}
// check if period is given
if($_POST["period"]){
    // switch between where and and
    if(!$_POST["id"]){
        $sqlStatement = $sqlStatement . " WHERE";
    } else {
        $sqlStatement = $sqlStatement . " AND";
    }
    $switch;
    $end;
    // get the date values
    $start = (new DateTime('first day of ' . $_POST["period"] . ' month 00:00:00'))->format('Y-m-d H:i:s');
    $end = (new DateTime('last day of ' . $_POST["period"] . ' month 00:00:00'))->format('Y-m-d H:i:s');
    $sqlStatement = $sqlStatement . ' pd.visit >= ? AND pd.visit <= ?';
    array_push($arrayToExecute, $start, $end);
}
// sql statement
$sqlStatement = $sqlStatement . ' GROUP BY p.id;';
// output json
outputJSON($pdo, $sqlStatement, $arrayToExecute);