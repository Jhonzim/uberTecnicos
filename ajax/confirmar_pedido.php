<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include("../mysql_conection.php");
    $idServico = $_GET["s"];

    $query = "UPDATE servico SET Status = '3' WHERE `servico`.`ID` = $idServico;";
    $result = $con->query($query);
    if($result){
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
    
?>