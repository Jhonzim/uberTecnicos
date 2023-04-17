<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION["user_id"])){
        die("Faça login para cadastrar seu serviço");
    }

    include("../mysql_conection.php");
    if(isset($_POST["quando"])){

        $pathsPermitidos = ["png", "jpg", "jpeg"];
        $nomeDaImagemBd = "";


        if(isset($_FILES["imagem"]) && $_FILES["imagem"]["name"] != ""){
            $imagem = $_FILES["imagem"];
            $pasta = "../upload/";
            $nomeDaImagem = uniqid();
            $extensao = strtolower(pathinfo($imagem["name"],PATHINFO_EXTENSION));
            if(in_array($extensao, $pathsPermitidos)){
                $uploadFeito = move_uploaded_file($imagem["tmp_name"], $pasta.$nomeDaImagem.".".$extensao);
                if($uploadFeito){

                }else{
                    
                    echo json_encode("erro no upload");
                    die("erro no upload");
                }
            }else{
                
                echo json_encode("Erro na extensão");
                die("Erro na extensão");
            }

            $nomeDaImagemBd = $nomeDaImagem.".".$extensao;
        }


        $quando = $_POST["quando"];
        $locomocao = $_POST["locomocao"];
        $descricao = $_POST["descricao"];
        $ferramentas = $_POST["ferramentas"];
        $pagamento = $_POST["pagamento"];
        $titulo = $_POST["titulo"];
        $tipo = intval($_POST["tipo"]);
        $idUser = intval($_SESSION["user_id"]);

        switch ($quando) {
            case '1':
                $quando = date("Y-m-d", strtotime("+1 week"));
                break;
            case '2':
                $quando = date("Y-m-d", strtotime("+1 month"));
                break;
            case '3':
                $quando = date("Y-m-d", strtotime("+3 month"));
                break;
            default:
                $quando = null;
                break;
        }

        $query= "INSERT INTO Servico (id_Usuario, id_Categoria, Descricao, Status, Pagamento, status_Usuario, status_Tecnico, Titulo, Locomocao, Ferramentas, Previsao, Imagem) values (".$idUser.",".$tipo.", '".$descricao."', '1', '".$pagamento."', '1', '1', '".$titulo."', $locomocao, $ferramentas, '$quando', '$nomeDaImagemBd')";
        $result = $con->query($query);
        echo json_encode("certo");
    }


