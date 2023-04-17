<?php
        //if(!isset($_SESSION)){
            //session_start;
        //}
        //if(isset($_SESSION["user_id"]) || isset($_SESSION["tecc_id"])){
            //die("Você não pode acessar esta página");
        //}

        include("../mysql_conection.php");
        if(isset($_POST['cad_nome'])){
            $senha = password_hash($_POST['cad_senha'], PASSWORD_DEFAULT);
            $nome = ($_POST['cad_nome']);
            $email = mysqli_real_escape_string($con, $_POST['cad_email']);
            $endereco = ($_POST['cad_endereco']);
            $cpf = ($_POST['cad_cpf']);
            $telefone = mysqli_real_escape_string($con, $_POST['cad_telefone']);
            
            $query= "INSERT INTO Usuario (Senha, Nome , Email, CPF, Endereco, Telefone) values ('".$senha."', '".$nome."','".$email."', '".$cpf."', '".$endereco."', '".$telefone."')";

            
            $e = verificaEmail($con, $email, "Usuario");
            if($e){
                if(strlen($_POST["cad_senha"]) < 8){
                    echo json_encode("senha_error");  
                    die();
                }
                $retorno = $con->query($query) or die ("Não foi possivel a inseção de dados");
                echo json_encode("certo");
            }
            else{
                echo json_encode("email_error");
                
            }
        }else{
            echo json_encode("passei aqui : ".$_POST["cad_senha"]);
        } 
        
    ?> 