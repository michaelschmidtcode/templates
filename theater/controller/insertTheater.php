<?php
include("../dbConnection.php");
// pdo
$pdo = returnPDO();
// sql 
$sqlStatement = "INSERT INTO drama(dra_name,gen_id,autor_id) VALUES (?,?,?)";
$sqlStatement2 = "INSERT INTO dramaevent(eve_termin,dra_id) VALUES (?,?)";
$sqlStatementResponse = "SELECT d.dra_id, g.gen_name, d.dra_name, p.per_vName, p.per_nName,
    de.eve_termin FROM drama d LEFT JOIN genre g ON g.gen_id = d.gen_id LEFT JOIN dramaevent de
    ON d.dra_id = de.dra_id LEFT JOIN person p ON d.autor_id = p.per_id ORDER BY d.dra_name, de.eve_termin";
// output json
$id = outputJSON($pdo, $sqlStatement, [$_POST['dra_name'],$_POST['gen_id'],$_POST['autor_id']], true, true);
if($id != false){
    if(outputJSON($pdo, $sqlStatement2, [$_POST['eve_termin'],$id], true)){
        outputJSON($pdo, $sqlStatementResponse, []);
    }
}
