<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/possivellogo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
    <title>Menu</title>
</head>
<body class="menu-body">
<section style="min-height:100vh !important;" class="areas-fundo">
    <header class="unselectable fixheader">
        <nav class="menu-header">
            <div class="boxheader">
            <a href="index.php"><span data-tooltip="Voltar para página inicial"><img src="images/logo3.png" alt="Nome do site"class="titulo-site"></a>
            </div>
            <div class="boxheader">
                <?php
                    if(isset($_GET["i"])){
                        if ($_GET["i"] == "login") {
                            echo '<h1 class="indicador">Login</h1>';
                        }else if($_GET["i"] == "cad"){
                            echo '<h1 class="indicador">Cadastro</h1>';
                        }
                    }
                ?>
            </div>
            
            <div class="nav-links-menu boxheader">
                <ul>
                    <?php
                        if(!isset($_SESSION["user_id"]) && !isset($_SESSION["tec_id"])){
                            echo "<li><a class='desativo-link links-menu' href='?i=login' >LOGIN</a></li>
                            <li><a class='desativo-link links-menu cadastro-btn' href='?i=cad' >CADASTRE-SE</a></li>";
                        }else{
                            echo '<li><a href="logout.php">SAIR</a></li>';
                        }
                    ?>
                    <?php
                        
                        /*$pagina = $_GET['i'];
                        if($pagina != "forum"){
                            echo "<li><a class='desativo-link'href='?i=forum'>FÓRUM</a></li>";
                        }else{
                            echo "<li><a class='ativo-link'href='?i=forum'>FÓRUM</a></li>";
                        }
                        if($pagina != "login"){
                            echo '<li><a class=\'desativo-link\' href="?i=login">LOGIN</a></li>';
                        }else{
                            echo '<li><a class=\'ativo-link\' href="?i=login">LOGIN</a></li>';
                        }
                        if($pagina != "cad"){
                            echo '<li><a class=\' desativo-link\' href="?i=cad" class="cadastro-btn">CADASTRE-SE</a></li>';
                        }else{
                            echo '<li><a class=" ativo-link " href="?i=cad" >CADASTRE-SE</a></li>';
                        }*/
                    ?>
                    <li><i class="fa fa-sun" id="icon"></i></li>         
                </ul>
            </div>
        </nav>
    </header>
    
<?php
    $pagina = "home";
    if(isset($_GET["i"])){
        $pagina = $_GET["i"];
    }

    switch ($pagina) {
        case 'forum':
            include "forum/forum.php";
            break;
        case 'login':
            include "login/login.php";
            break;
        case 'cad':
            include "cadastro/cadastro.php";
            break;
        default:
            header("Location: index.php");
            break;
    }
?>
<!--
    <section class="footer">
        <h4>Sobre nós</h4>
        <p>O Tech Share é um projeto desenvolvido para que técnicos ganhem uma renda extra enquanto usuários recebem serviços para auxiliar em seu cotidiano.</p>
        <div class="icons">
            <a class="cancela"href="mailto:Joaopedroalmeida2004@gmail.com?body=Olá, tenho uma dúvida!" target="_blank" class="hero-btn"><i class="fa fa-at"></i></a>
        </div>
        <p>Desenvolvido com <i class="fa fa-heart-o"></i> por João, Fabio e Jean</p>
    </section> 
-->
    <script src="./js/script.js"></script>
    <script src="./js/funcoes.js"></script>
</body>
</html>
