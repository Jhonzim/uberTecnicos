<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include("../mysql_conection.php");
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
<body>
    <header class="fixheader">
        <nav class="menu-header">
            <div>
            <span data-tooltip="Voltar para página inicial"><a href="../index.php"><img src="../images/logo3.png" alt="Nome do site" class="titulo-site"></a>
            </div>
            <div class="nav-links-menu">
                <ul>
                    <li><a href="../cadastrartipos.php">test</a></li>
                    <li ><a href="#" id="mail"><i class="fa fa-envelope" ></i></a>

                    </li>
                    <li><a href="../index.php"><i class="fa fa-plus"></i></a></li>
                    <!--<li>
                        <a href="#" id="perfil" style="display: flex; line-height: 40px;"><img src="../images/retrato.png" alt="imagem-pessoal" id="img-user" style="width:40px; height:40px; border-radius:50%; align-self:center; margin-right: 10px;"><?php echo $_SESSION["user_nome"] ?? "Anônimo"; ?></a>
                    </li>-->
                    <?php
                        if(!isset($_SESSION["user_id"]) && !isset($_SESSION["tec_id"])){
                            echo "<li><a class='desativo-link links-menu' href='../?i=login' >LOGIN</a></li>
                            <li><a class='desativo-link links-menu cadastro-btn' href='../?i=cad' >CADASTRE-SE</a></li>";
                        }else{
                            if(isset($_SESSION["img_perfil"]) && $_SESSION["img_perfil"] != ""){
                                $href = $_SESSION["img_perfil"];
                            }else{
                                $href = "semimagem.png";
                            }
                            echo '<li><a href="./?id_page=5"><div class="tooltip"><img class="imgp" src="../upload/'.$href.'" alt=""></div></a>';
                        }
                    ?>
                    <li><i class="fa fa-sun" id="icon"></i></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <div>
        <a href="./?id_page=1">tec servicos</a>
        <a href="./?id_page=3">all servicos</a>
    </div>
</body>
    <script src="../js/script.js"></script>
</html>