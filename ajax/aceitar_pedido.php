<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include("../mysql_conection.php");
    $idServico = $_GET["s"];
    $idTec = $_SESSION["tec_id"];

    $query = "UPDATE servico SET Status = '2', id_Tecnico = '$idTec' WHERE `servico`.`ID` = $idServico;";
    $result = $con->query($query);
    if($result){
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
    
?>