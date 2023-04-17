<?php
    
    

?>
<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
<meta charset="utf-8">
    <title>Owl-carousel Cards Slider | CodingNepal</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="../estilo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</head>
<body>
<header class="fixheader">
    <nav class="menu-header">
        <div>
        <span data-tooltip="Voltar para página inicial"><a href="../index.php"><img src="../images/logo3.png" alt="Nome do site" class="titulo-site"></a>
        </div>
        <div class="nav-links-menu">
            <ul>
                <li>
                    <a href="../cadastrartipos.php">test</a>
                </li>
                <li>
                    <a href="#" id="mail"><i class="fa fa-envelope"></i></a>
                </li>
                <li>
                    <a href="../cadservicos.php"><span title="Cadastrar serviço"><i class="fa fa-plus"></i></span></a>
                </li>
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
                        echo '<li><a href="logado/?id_page=5"><div class="tooltip"><img class="imgp" src="../upload/'.$href.'" alt=""></a>';
                    }
                ?>
                <li><i class="fa fa-sun" id="icon"></i></li>
            </ul>
        </div>
    </nav>
</header>
    <div class="sub-menu-1 nav-links-menu">
        <ul>
            <li><a href="#">Jhonzim</a></li>
            <li><a href="#">Pegarex2017</a></li>
        </ul>
    </div>
    <div class="sub-menu-2 nav-links-menu">
        <ul>
            <li><a href="#">Jhonzim</a></li>
            <li><a href="#">Pegarex2017</a></li>
        </ul>
    </div>
<a href="./?id_page=1">pagina de servicos do usuario</a>
<div class="carrosel" align="center">
    <div class="swiper">
    <div class="swiper-wrapper">
        <?php
        
        if(!isset($_SESSION)){
            session_start();
        }
        include("../mysql_conection.php");
        
        $codigo = "SELECT * FROM Categoria_servico limit 21;";
        $result = $con->query($codigo);

        while($res = $result->fetch_assoc()){
        echo '<div class="swiper-slide">
            <section>
                <div class="container">
                    <div class="content">
                        <div class="card">
                            <div class="card-content">
                                <div style="height:33%">
                                    <div class="image" >
                                        <img src="../images/'.$res["Img"].'" alt="">
                                    </div>

                                    <div class="media-icons">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-github"></i>
                                    </div>
                                </div>

                                <div class="name-profession">
                                    <span class="name">'.$res["Tipo"].'</span>
                                    <span class="profession">'.$res["Descricao"].'.</span>
                                </div>

                                <div class="rating">
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>

                                <div class="button">
                                    <button class="aboutMe" onclick="setPage(\"'.strtolower(str_replace(" ", "", $res["Tipo"])).'\")">Sobre</button>
                                    <button class="hireMe" onclick="setPage(\''.$res["ID"].'\')">Inquirir</button>
                                    <a class="hireMe" href="deletar.php?q='.$res["ID"].'")" style="z-index:100">Del</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>';   
        }?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    </div>
</div>

<section class="contact-us">
    <div class="servicos">
        <h1>Categorias de serviços</h1><!-- centralizar -->
        <div class="lista">
            <div class="lista-box">
                <i class="fa fa-keyboard"></i> <!-- ou fa fa-duotone fa-code-->
                <h3>Programação</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-screwdriver-wrench"></i>
                <h3>Assistência técnica</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-wand-magic-sparkles"></i>
                <h3>Edição profissional</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
            <div class="lista-box">
                <i class="fa fa-duotone fa-toolbox"></i>
                <h3>Instalação de equipamentos</h3>
            </div>
        </div>
    </div>
</section>

<section class="footer" style="box-sizing:border-box">
    <h4>Sobre nós</h4>
    <p>O Tech Share é um projeto desenvolvido para que técnicos ganhem uma renda extra enquanto usuários recebem serviços para auxiliar em seu cotidiano.</p>
    <div class="icons">
        <a href="mailto:Joaopedroalmeida2004@gmail.com?body=Olá, tenho uma dúvida!" target="_blank" class="hero-btn"><i class="fa fa-at"></i></a>
    </div>
    <p>Desenvolvido com <i class="fa fa-heart-o"></i> por João, Fabio e Jean</p>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,

        pagination: {
        clickable: true,
        el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
    });
</script>
<script src="../js/script.js"></script>
<script src="../js/funcoes.js"></script>
</body>

</script>

</html>