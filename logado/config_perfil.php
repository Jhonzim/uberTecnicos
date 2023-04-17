<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION["user_id"])){
        $user = "usuario";
        $id = $_SESSION["user_id"];
        $tipo = "Usuário";

    }else if(isset($_SESSION["tec_id"])){
        $user = "tecnico";
        $id = $_SESSION["tec_id"];
        $tipo = "Técnico";
    }else{
        header("Location: notfound.php");
    }

    $query = "SELECT * FROM $user Where Id = $id";
    $result = $con->query($query);
    $perfil = $result->fetch_assoc();

    if(isset($_POST["telefone"])){
        $telefone = $_POST["telefone"];
        $bio = $_POST["biografia"];
        $pathsPermitidos = ["png", "jpg", "jpeg"];
        $nomeDaImagemBd = "";

        $endereco = $_POST["endereco"];

        if(isset($_FILES["imagem"]) && $_FILES["imagem"]["name"] != ""){
            $imagem = $_FILES["imagem"];
            $pasta = "../upload/";
            $nomeDaImagem = uniqid();
            $extensao = strtolower(pathinfo($imagem["name"],PATHINFO_EXTENSION));
            if(in_array($extensao, $pathsPermitidos)){
                $uploadFeito = move_uploaded_file($imagem["tmp_name"], $pasta.$nomeDaImagem.".".$extensao);
                if($uploadFeito){

                }else{
                    
                    die("erro no upload");
                }
            }else{
                die("Erro na extensão");
            }

            $nomeDaImagemBd = $nomeDaImagem.".".$extensao;
        }
        $queryBio = "UPDATE $user SET Bio = '$bio' WHERE `ID` = $id;";
        $queryTelefone = "UPDATE $user SET Telefone = '$telefone' WHERE `ID` = $id;";
        $queryImagem = "UPDATE $user SET Foto_pessoal = '$nomeDaImagemBd' WHERE `ID` = $id;";
        $queryEndereco = "UPDATE $user SET Endereco = '$endereco' WHERE `ID` = $id;";

        $result = $con->query($queryBio);
        $result = $con->query($queryTelefone);
        if($result){
            $result = $con->query($queryEndereco);
            if($result){
                if($nomeDaImagemBd != ""){
                    $result = $con->query($queryImagem);
                    if($result){
                        $result = $con->query($queryEndereco);
                        if($result){
                            $_SESSION["img_perfil"] = $nomeDaImagemBd;
                            echo "<script>alert('Todos os dados atualizados com sucesso')</script>";
                            header("Location: ./?id_page=6");
                        }
                    }else{
                        $error = "Erro ao atualizar a imagem";
                        
                    }
                }else{
                    header("Location: ./?id_page=6");
                }
            }else{
                $error = "Erro ao atualizar endereço<br>Telefone atualizado com sucesso";
                
            }  
        }else{
            $error = "Erro ao atualizar o telefone";
            
        }
       
    }

?>
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/possivellogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
    <title>Menu</title>
</head>
<body class="menu-body">
<section style="min-height:100vh !important;" class="areas-fundo">
    <header class="unselectable fixheader">
        <nav class="menu-header">
            <div>
            <span data-tooltip="Voltar para página inicial"><a href="../index.php"><img src="../images/logo3.png" alt="Nome do site"class="titulo-site"></a>
            </div>
            <div class="nav-links-menu">
                <ul>
                    <li>
                        <a href="./?id_page=1" id="list-servicos"><i class="fa fa-list"></i></a>
                    </li>
                    <?php
                        if(isset($_SESSION["img_perfil"]) && $_SESSION["img_perfil"] != "" && file_exists("../upload/".$_SESSION["img_perfil"])){
                            
                            $href = $_SESSION["img_perfil"];
                        }else{
                            $href = "semimagem.png";
                        }
                        echo '<li><a href="./?id_page=5"><div class="tooltip"><img class="imgp" src="../upload/'.$href.'" alt=""></div></a>'; 
                    ?>
                    <li><i class="fa fa-sun" id="icon"></i></li>         
                </ul>
            </div>
        </nav>
    </header>
    <div class="main-perfil">
        <div class="title">
            <h1>Detalhes do perfil</h1>
            <h2>Editar perfil</h2>
        </div>
        <div>
            <form action="" method="post" id="form-perfil" enctype="multipart/form-data">
                <div class="img-perfil">
                    <?php
                        if($perfil["Foto_pessoal"] != "" && file_exists("../upload/".$perfil["Foto_pessoal"])){
                            echo "<label for='img-perfil'><img src='../upload/".$perfil["Foto_pessoal"]."' alt=''></label>
                            <input type='file' name='imagem' id='img-perfil'>";
                        }else{
                            echo '<label for="img-perfil"><img src="../upload/semimagem.png" alt=""></label>
                            <input type="file" name="imagem" id="img-perfil">';
                        }  
                    ?>
                </div>
                <div class="inputs-update">
                    <div class="div-update faint">
                        <label for="nome">Nome completo</label>
                        <input class="input-update disabled"type="text" readonly value="<?php echo $perfil["Nome"];?>">
                    </div>
                    <div class="div-update faint">
                        <label for="nome">E-mail</label>
                        <input class="input-update disabled" type="text" readonly value="<?php echo $perfil["Email"];?>">
                    </div>
                    <div class="div-update">
                        <label for="telefone">Telefone</label>
                        <input class="input-update" type="text" name="telefone" placeholder="(00) 00000-0000" maxlength="15" onkeyup="handlePhone(event)" value="<?php echo $perfil["Telefone"];?>">
                    </div>
                    <div class="div-update">
                        <label for="endereco">Endereço</label>
                        <input class="input-update" type="text" name="endereco" value="<?php echo $perfil["Endereco"];?>">
                    </div>
                    <div class="div-update bio-update">
                        <label for="bio">Descrição</label>
                        <textarea class="input-update text-area-update" name="biografia" type="text" maxlength="200" rows="4"><?php echo $perfil["Bio"];?></textarea>
                    </div>
                    <button class="button-update">Atualizar dados</button>
                </div>
                
            </form>
        </div>
    </div>
    <section class="footer bgc">
        <h4>Sobre nós</h4>
        <p>O Tech Share é um projeto desenvolvido para que técnicos ganhem uma renda extra enquanto usuários recebem serviços para auxiliar em seu cotidiano.</p>
        <div class="icons">
        <a class="cancela"href="mailto:Joaopedroalmeida2004@gmail.com?body=Olá, tenho uma dúvida!" target="_blank" class="hero-btn"><i class="fa fa-at"></i></a>
        </div>
        <p>Desenvolvido com <i class="fa fa-heart-o"></i> por João, Fabio e Jean</p>
    </section>

</body>
</html>