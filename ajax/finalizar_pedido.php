<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include("../mysql_conection.php");
    $idServico = $_GET["s"];

    if (isset($_SESSION["tec_id"])) {
        $idTec = $_SESSION["tec_id"];
        $query = "UPDATE servico SET status_Tecnico = '2' WHERE `servico`.`ID` = $idServico;";
        $result = $con->query($query);
        if($result){
            $queryStatus = "SELECT Status, status_Usuario as stu, status_Tecnico as stt from servico where id = $idServico";
            $ex = $con->query($queryStatus);
            $status = $ex->fetch_assoc();
            if ($status["stt"] == 2 && $status["stu"] == 2) {
                $queryFinalizacao = "UPDATE servico SET Status = '4' WHERE `servico`.`ID` = $idServico;";
                $finalizacao = $con->query($queryFinalizacao);
                if ($finalizacao) {
                    $resultado = '2';
                }else{
                    $resultado = '0';
                }
                echo json_encode('{"finalizacao": '.$resultado.', "update": 1}');
            }else{
                echo json_encode('{"finalizacao": 1, "update": 1}');
            }
            
        } else {
            echo json_encode(0);
        }
    } else {
        $idUser = $_SESSION["user_id"];
        $query = "UPDATE servico SET status_Usuario = '2' WHERE `servico`.`ID` = $idServico;";
        $result = $con->query($query);
        if($result){
            $queryStatus = "SELECT Status, status_Usuario as stu, status_Tecnico as stt from servico where id = $idServico";
            $ex = $con->query($queryStatus);
            $status = $ex->fetch_assoc();
            if ($status["stt"] == 2 && $status["stu"] == 2) {
                $queryFinalizacao = "UPDATE servico SET Status = '4' WHERE `servico`.`ID` = $idServico;";
                $queryDataFim = "UPDATE servico SET Data_fim = ".date("Y-m-d")." WHERE `servico`.`ID` = $idServico;";

                $finalizacao = $con->query($queryFinalizacao);
                if ($finalizacao) {
                    $resultado = '2';
                }else{
                    $resultado = '0';
                }
                echo json_encode('{"finalizacao": '.$resultado.', "update": 1}');
            }else{
                echo json_encode('{"finalizacao": 1, "update": 1}');
            }
        } else {
            echo json_encode(0);
        }
    }
?>