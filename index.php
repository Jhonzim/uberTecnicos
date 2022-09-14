<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="pt-br" data-theme='ligth'>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="TCC 2022 - Nome sugestivo">
    <meta name="keywords" content="Técnicos Informática Terceirização Uberização Conserto Manutenção Montagem Conexão Rede">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/logo3.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="bootstrap/bootstrap.min.css">-->
    <title>Tech Share</title>
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.php"><img src="https://www.ccda.com.br/wp-content/uploads/2015/06/DSC_04921.jpg" alt="Nome do site"></a>
            <h1 class= "titulo">TECH SHARE</h1>
            <div class="nav-links">
                <ul>
                    <li><a href='menu.php?i=forum'>FÓRUM</a></li>
                    <?php
                        if(!isset($_SESSION["user_id"]) && !isset($_SESSION["tec_id"])){
                            echo '<li><a href="menu.php?i=login">LOGIN</a></li>
                            <li><a href="menu.php?i=cad" class="cadastro-btn">CADASTRE-SE</a></li>';
                        }else{
                            echo '<li><a href="logout.php">SAIR</a></li>';
                        }
                    ?>
                    <i class="fa fa-sun" id="icon" ></i>
                </ul>
            </div>
        </nav>
        <div class="text-box">
            <h1>Uma Grande Proposta</h1>
            <p>O Tech Share tem como objetivo facilitar o contato entre o técnico e o<br>
            contratante, assim, podendo tornar a sua vida mais simples.</p>
            <a href="#course" class="hero-btn">Saiba mais</a>
        </div>
    </section>
    <section class="index-main">
        <section class="course" id="course"> 
            <div class="h1">
                <h1>Áreas suportadas</h1>
                <p>Algumas das áreas em que podemos te apoiar</p>
            </div>
            <div class="row">
                <div class="course-col">
                    <h3>Programador de sites</h3>
                    <p>Se você ainda questiona por que uma empresa precisa ter um site, reflita: você conhece alguma marca de sucesso que não tenha um site próprio? Independentemente do segmento, local ou tamanho, esse é o denominador comum entre todos os negócios de sucesso.</p>
                </div>
                <div class="course-col">
                    <h3>Manutenção de computadores</h3>
                    <p>A manutenção regular no seu computador permite que você identifique pequenos problemas antes que eles se tornem grandes. Além disso, a tendência é que o computador perca o seu desempenho com o passar do tempo. Nesse sentido, a manutenção ajuda a reduzir os possíveis impactos dessa ação.</p>
                </div>
                <div class="course-col">
                    <h3>Instalação de redes</h3>
                    <p>Planejamento, implementação e administração de redes de computadores ponto a ponto, até uma rede de dados mais complexa com servidores dedicados e também a instalação e configuração de roteadores wireless e cabeados, rack's, cabeamentos, compartilhamento de internet e tudo mais para sua melhor conexão.</p>
                </div>
            </div>
        </section>
    
        <section class="campus">
            <h1>Nosso Site</h1>
            <p></p>
            
            <div class="row">
                <div class="campus-col">
                    <img src="https://blog-geek-midia.s3.amazonaws.com/wp-content/uploads/2019/09/26175514/Um-guia-para-o-programador-iniciante.jpg" alt="Altos Códigos Bolados">
                    <div class="layer">
                        <h3>Programadores Freelancers</h3>

                    </div>
                </div>
                <div class="campus-col">
                    <img src="images/the-technician-repairing-the-computer-computer-hardware-repairing-upgrade-and-technology.jpg" alt="Computadores sendo consertados">
                    <div class="layer">
                        <h3>Manutenção de computadores</h3>

                    </div>
                </div>
                <div class="campus-col">
                    <img src="images/tecnicomechendo.jpeg" alt="Muitos Cabos de Cores Variadas">
                    <div class="layer">
                        <h3>Profissionais em <br>Cabeamento de Rede</h3>
                    </div>
                </div>
            </div>
        </section>
</section>

<section class="facilities">
    <h1><br><br><br>Áreas de atuação</h1>
    <p>Saiba onde nos encontrar</p>
    
    <div class="row">
        <div class="facilities-col">
            <img src="images/exp-paisagem.jpg" alt="Imagem de sei lá o que">
            <h3>Rio de Janeiro</h3>
            <p>Lorem ipsum</p>
        </div>
        <div class="facilities-col">
            <img src="images/exp1.jpg" alt="Imagem de sei lá o que">
            <h3>São Paulo</h3>
            <p>Lorem ipsum</p>
        </div>
        <div class="facilities-col">
            <img src="images/retrato.png" alt="Imagem de sei lá o que">
            <h3>Bahia</h3>
            <p>Lorem ipsum</p>
        </section>
        
        <section class="testimonials">
            <h1>Quem contratamos</h1>
            <p>Conheça os perfis mais bem avaliados de nossos técnicos</p>
            
            <div class="row">
                <div class="testimonial-col">
                    <img src="images/retrato.png" alt="Imagem de sei lá o que">
                    <div>
                        <p>Minha dupla nas provas, ele que vai me passar em Matemática</p>
                        <h3>João Pedro</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <div class="testimonial-col">
                <img src="images/retrato.png" alt="Imagem de sei lá o que">
                <div>
                    <p>Minha dupla nas provas, ele que vai me passar em Física</p>
                    <h3>Jean</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
    </section>
    
    <section class="cta">
        <h1>Algo de errado?</h1>
        <a href="#" class="hero-btn">NOS CONTATE</a>
    </section>

    <section class="footer">
        <h4>Sobre nós</h4>
        <p>O Tech Share é um projeto desenvolvido para que técnicos possam ter uma renda extra <br>
        enquanto se profissinalizam mais atendendo as dificuldades e necessidadeas dos usuários.</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
            <i class="fa fa-whatsapp"></i>
            
        </div>
        <p>Desenvolvido com <i class="fa fa-heart-o"></i> por João, Fabio e Jean.</p>
        <p>Nós <i class="fa fa-heart-o"></i> você, G.G.</p>
    </section>
    <script src="script.js"></script>
</body>
</html>