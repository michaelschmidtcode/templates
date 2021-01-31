<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDONewDB();
// sql 
$sqlStatement = 'select Genre, Filmtitel, Jahr, Regie from tblpremiere where genre like ? or filmtitel like ? or jahr like ? or regie like ?';
// output json
$search = '%'.$_POST["search"].'%';
outputJSON($pdo, $sqlStatement, [$search,$search,$search,$search]);