<?php 

function returnPDO(){
    $pdo = new PDO('mysql:host=localhost;dbname=filmdatenbank', 'root', '');
    return $pdo;
}

function returnPDONewDB(){
    $pdo = new PDO('mysql:host=localhost;dbname=dbmovie', 'root', '');
    return $pdo;
}

function outputJSON($pdo, $sqlStatement, $arrayToExecute, $noEcho = false){
    try {
        $error = false;
        $sql = $pdo->prepare($sqlStatement);
        if($sql->execute($arrayToExecute)){
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $message = "";
            if($sql->errorInfo()[0] == 23000){
                $message = "Eintrag schon vorhanden!";
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
        }
        if(!$error){
            return true;
        }
    } catch (Exception $e) {
        echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
    }
}