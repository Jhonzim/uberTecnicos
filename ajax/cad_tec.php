<?php
        //if(!isset($_SESSION)){
            //session_start;
        //}
        //if(isset($_SESSION["user_id"]) || isset($_SESSION["tecc_id"])){
            //die("Você não pode acessar esta página");
        //}

        include("../mysql_conection.php");
        if(isset($_POST['cad_nome'])){

            $pathsPermitidos = ["pdf"];
            $nomeDaImagemBd = "";
            var_dump($_FILES["curriculo"]);
            if(isset($_FILES["curriculo"]) && $_FILES["curriculo"]["name"] != ""){
                $imagem = $_FILES["curriculo"];
                $pasta = "../certificados/";
                $nomeDaImagem = uniqid();
                $extensao = strtolower(pathinfo($imagem["name"],PATHINFO_EXTENSION));
                if(in_array($extensao, $pathsPermitidos)){
                    $uploadFeito = move_uploaded_file($imagem["tmp_name"], $pasta.$nomeDaImagem.".".$extensao);
                    if($uploadFeito){
                        
                    }else{
                        
                        echo json_encode("Erro no upload");
                        die("Erro no upload");
                    }
                }else{
                    
                    echo json_encode("Erro na extensão");
                    die("Erro na extensão do arquivo");
                }
    
                $nomeDaImagemBd = $nomeDaImagem.".".$extensao;
            }
            $senha = password_hash($_POST['cad_senha'], PASSWORD_DEFAULT);
            $nome = ($_POST['cad_nome']);
            $email = mysqli_real_escape_string($con, $_POST['cad_email']);
            $endereco = ($_POST['cad_endereco']);
            $cpf = ($_POST['cad_cpf']);
            $telefone = mysqli_real_escape_string($con, $_POST['cad_telefone']);
            
            $query= "INSERT INTO Tecnico (Senha, Nome , Email, CPF, Endereco, Telefone, Curriculo) values ('".$senha."', '".$nome."','".$email."', '".$cpf."', '".$endereco."', '".$telefone."', '$nomeDaImagemBd')";

            
            $e = verificaEmail($con, $email, "Tecnico");
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