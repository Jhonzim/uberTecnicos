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
<body class="menu-body" style="text-align: center;">
<section style="min-height:100vh !important;" class="areas-fundo">
    <header class="unselectable fixheader">
        <nav class="menu-header">
            <div>
            <span data-tooltip="Voltar para página inicial"><a href="../index.php"><img src="../images/logo3.png" alt="Nome do site"class="titulo-site"></a>
            </div>
            <div class="nav-links-menu">
                <ul>
                    <?php
                        if(!isset($_SESSION["user_id"]) && !isset($_SESSION["tec_id"])){
                            echo "<li><a class='desativo-link links-menu' href='../?i=login' >LOGIN</a></li>
                            <li><a class='desativo-link links-menu cadastro-btn' href='../?i=cad' >CADASTRE-SE</a></li>";
                        }else{
                            if(isset($_SESSION["img_perfil"]) && $_SESSION["img_perfil"] != "" && file_exists("../upload/".$_SESSION["img_perfil"])){
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
    <h2 onclick="history.back()" style="cursor: pointer; padding-top: 30px; font-family: 'Roboto';">Página não encontrada clique aqui para retornar</h2>
</body>
</html>