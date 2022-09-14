<?php
    $host='localhost';
    $bd='tcc';
    $user='root';
    $pwd='';
   
    $con = new mysqli($host, $user, $pwd, $bd) or die ('Impossivel abrir esta base de dados');
    
    function verificaEmail($cone, $var, $tabela){
        $code = "SELECT * FROM ".$tabela." WHERE Email = '".$var."'";
        $result = $cone->query($code) or die ("Não foi possivel a inseção de dados");
        $linhas = $result->num_rows;
        if($linhas == 0){
            return true;
        }
        else{
            return false;
        }
    }
?>