<?php
    function retornaNameForm1($pag, $valor, $texto, $texto2){
        $get = $_GET[$pag];
        if($get == $valor){
            return $texto;
        }else{
            return $texto2;
        }
    }

    function retornaNameForm2($pag, $valor, $texto, $texto2){
        $get = $_GET[$pag];
        if($get == $valor){
            return $texto2;
        }else{
            return $texto;
        }
    }
?>