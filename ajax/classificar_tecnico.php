<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include("../mysql_conection.php");
    $idServico = $_GET["s"];
    $idTecnico = $_GET["tec"];
    $value = $_GET["value"];
    $value = str_replace(' ', '', $value);
    $value = str_replace(',', '.', $value);

    $query = "SELECT Classificacao from servico where ID = $idTecnico";
    $result = $con->query($query);
    if($result){
        $numRows = $result->num_rows;
        $soma = 0;
        while($class = $result->fetch_assoc()){
            if($class["Classificacao"] != null){
                $soma .= $class["Classificacao"];
            } 
        }
        $soma = ($soma + intval($value))/1+$numRows;
        $queryUpdate = "UPDATE servico SET Classificacao = $soma WHERE ID = $idServico;";
        $update = $con->query($queryUpdate);
        if ($update) {
            echo json_encode(1);
        }
    } else {
        echo json_encode(0);
    }
    
    
    
    
    
    
    
?>