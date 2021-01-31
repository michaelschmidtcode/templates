<?php 

function returnPDO(){
    $pdo = new PDO('mysql:host=localhost;dbname=theater', 'root', '');
    return $pdo;
}

function outputJSON($pdo, $sqlStatement, $arrayToExecute, $noEcho = false, $returnID = false){
    try {
        $error = false;
        $sql = $pdo->prepare($sqlStatement);
        if($sql->execute($arrayToExecute)){
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $message = "";
            if($sql->errorInfo()[0] == 23000){
                $message = "In der Tabelle drama existiert bereits ein Eintrag " . $arrayToExecute[0];
            } else {
                $message = $sql->errorInfo()[2];
            }
            $results = array(
                "error" => true,
                "message" => $message
            );
            $error = true;
        }    
        $json = json_encode($results);
        if(!$noEcho || $error){
            echo($json);
            if($error){
                return false;
            }
        } else if($returnID) {
            return $pdo->lastInsertId();
        }
        if(!$error){
            return true;
        } 
    } catch (Exception $e) {
        echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
    }
}