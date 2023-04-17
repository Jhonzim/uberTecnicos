<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include("../mysql_conection.php");
    $idServico = $_GET["s"];

    $query = "UPDATE servico SET Status = '1', id_Tecnico = '' WHERE `servico`.`ID` = $idServico;";
    $result = $con->query($query);
    echo json_encode(2);
?>