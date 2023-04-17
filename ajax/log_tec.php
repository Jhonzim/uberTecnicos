<?php
         if (!isset($_SESSION)) {
            session_start();
        }
        include("../mysql_conection.php");
        if(isset($_POST['login_tecsenha'])){
            $email = mysqli_real_escape_string($con, $_POST['login_tecemail']);
            $senha = mysqli_real_escape_string($con, $_POST["login_tecsenha"]);
            
            $query= "SELECT * FROM Tecnico WHERE Email = '".$email."'";
            $retorno = $con->query($query) or die ("Não foi possivel a inseção de dados");
            $rows = $retorno->num_rows;
            if($rows == 1){
                $al = $retorno->fetch_assoc();
                $senhaBd = $al["Senha"];
                if(password_verify($senha, $senhaBd)){
                    
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION["tec_id"] = $al["ID"];
                    $_SESSION["tec_nome"] = $al["Nome"];
                    $_SESSION["tec_email"] = $al["Email"];
                    $_SESSION["img_perfil"] = $al["Foto_pessoal"];
                    
                    echo json_encode("certo");
                }else{
                    echo json_encode("error");
                }

            }else{
                echo json_encode("error");
            }
        }else{
            echo json_encode("error");
        } 
        
    ?>