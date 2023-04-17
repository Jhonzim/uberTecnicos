<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION["user_id"])){
        $user = "user";
        $id = $_SESSION["user_id"];
        $tipo = "Usuário";

    }else if(isset($_SESSION["tec_id"])){
        $user = "tec";
        $id = $_SESSION["tec_id"];
        $tipo = "Técnico";
    }
?>
<!DOCTYPE html >
<html lang="pt-br" data-theme='light'>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="TCC 2022 - Nome sugestivo">
    <meta name="keywords" content="Técnicos Informática Terceirização Uberização Conserto Manutenção Montagem Conexão Rede">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/possivellogo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="bootstrap/bootstrap.min.css">-->
    <title>Tech Share</title>
</head>
<body>
  <div id="preloader"></div>
    <header class="header">
        <nav>
            <div class="boxheader boxtitulo">
                <a href="index.php"><span data-tooltip="Voltar para página inicial"><img src="images/possivellogo.png" alt="Nome do site"class="titulo-site"></a>
                <h1 class="titulo"><span data-tooltip="Voltar para página inicial">TECH SHARE</h1>
            </div>
            <div class="boxheader">
            </div>
            <div class="nav-links boxheader">
                <ul>
                    
                    <?php
                        if(!isset($_SESSION["user_id"]) && !isset($_SESSION["tec_id"])){
                            echo '<li><a href="menu.php?i=login" class="login-btn retangulo">LOGIN</a></li>
                            <li><a href="menu.php?i=cad" class="cadastro-btn">CADASTRE-SE</a></li>';
                        }else{
                            if(isset($_SESSION["img_perfil"]) && $_SESSION["img_perfil"] != "" && file_exists("./upload/".$_SESSION["img_perfil"])){
                                $href = $_SESSION["img_perfil"];
                            }else{
                                $href = "semimagem.png";
                            }

                            if(isset($_SESSION["user_id"])){
                                echo "<li><a href='logado/".$user."painel.php'>CATEGORIAS</a></li>
                                <li><a href='logado/?id_page=1'>PEDIDOS</a></li>";
                        
                            }else if(isset($_SESSION["tec_id"])){
                                echo "<li><a href='logado/?id_page=1'>ACEITOS</a></li>
                                <li><a href='logado/?id_page=3'>PEDIDOS</a></li>";
                            }
                            
                            
                            echo '<li><a href="logado/?id_page=5"><div class="tooltip"><img class="imgp" src="./upload/'.$href.'" alt=""></div></a></li>';
                        }
                    ?>
                    <i class="fa fa-sun" id="icon"></i>
                </ul>
            </div>
        </nav>
        <div class="text-box">
        <?php
            if(!isset($_SESSION["user_id"]) && !isset($_SESSION["tec_id"])){
                echo '<h1>Uma Grande Proposta</h1>
                <p>O Tech Share tem como objetivo facilitar o contato entre o técnico e o<br>contratante, assim, podendo tornar a sua vida mais simples.</p>
                <a href="#course" class="hero-btn">Saiba mais</a>';
            }else{
                if(isset($_SESSION["tec_nome"])){
                    $primeiroNome = explode(" ",$_SESSION["tec_nome"]);
                    $primeiroNome = ucfirst(current($primeiroNome));
                }else{
                    $primeiroNome = explode(" ",$_SESSION["user_nome"]);
                    $primeiroNome = ucfirst(current($primeiroNome));
                }
                
                echo '<h1>Bem Vindo<span class="span-a">(a)</span>, '.$primeiroNome.'</h1>
                <p>O Tech Share tem como objetivo facilitar o contato entre o técnico e o<br>contratante, assim, podendo tornar a sua vida mais simples.</p>
                <a href="#course" class="hero-btn">Saiba mais</a>';
            }
        ?>
        
            
        </div>
    </header>

    <section class="index-main">
        <section class="course" id="course"> 
            <div class="animated-text h1">
                <h1>Aqui, você encontra <span class="auto-type"></span></h1>
            </div>
            <h1>ÁREAS SUPORTADAS</h1>
            <p>Algumas das áreas em que podemos te apoiar</p>
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
    </section>

<section class="facilities">
    <h1>ÁREAS DE ATUAÇÃO</h1>
    <p>Saiba onde nos encontrar</p>
    
    <div class="row">
        <div class="facilities-col">
            <img src="images/saopaulo.jpg" alt="Imagem de sei lá o que">
            <h3>São Paulo</h3>
            <p>Nossa iniciativa tem uma forte presença em São Paulo, uma das maiores cidades do Brasil e um importante centro de negócios e tecnologia. Com uma equipe dedicada e experiente, nós oferecemos soluções para nossos clientes na região.</p>
        </div>
        <div class="facilities-col">
            <img src="images/rio.jpg" alt="Imagem de sei lá o que">
            <h3>Rio de Janeiro</h3>
            <p>Nossa presença no Rio de Janeiro permite que possamos estar próximos de nossos clientes e oferecer suporte eficiente em tempo real. Além disso, estamos sempre em busca de oportunidades de crescimento e expansão no Rio de Janeiro e em todo o Brasil.</p>
        </div>
        <div class="facilities-col">
            <img src="images/bahia.jpg" alt="Imagem de sei lá o que">
            <h3>Bahia</h3>
            <p>Estamos comprometidos em construir relacionamentos duradouros com nossos clientes e comunidades brasileiras. Logo, é claro que não deixariamos Bahia por fora do Tech Share. nossa iniciativa tem grande presença nesta região e cresce a cada dia.</p>
        </div>
                    
</section>

    <section class="testimonials">
        <h1>QUEM CONTRATAMOS</h1>
        <p>Conheça os perfis mais bem avaliados de nossos técnicos</p>
        <div class="row">
            <div class="testimonial-col">
                <img src="images/godoyperfiltcc.png">
                <div class="stars">
                    <p>Graduado e especializado em conhecimentos técnicos, habilidoso em identificar e resolver problemas com ambos hardware e software.</p>
                    <h3>Guilherme</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <div class="testimonial-col">
                <img src="images/flaviosousaperfiltcc.png">
                <div class="stars">
                    <p>Especializado em Redes de Computadores e Análise de sistemas. Resolve rapidamente problemas técnicos e garanta a continuidade do funcionamento da rede.</p>
                    <h3>Flávio</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
    </section>
    
    <section class="contact-us">
        <div class="cta">
            <div class="star-wrapper">
                <i href="#" class="fa fa-star s1"></i>
                <i href="#" class="fa fa-star s2"></i>
                <i href="#" class="fa fa-star s3"></i>
                <i href="#" class="fa fa-star s4"></i>
                <i href="#" class="fa fa-star s5"></i>
                <h1>Algo de errado?</h1>
                <a href="mailto:Joaopedroalmeida2004@gmail.com?body=Olá, tenho uma dúvida!" target="_blank" class="hero-btn">NOS CONTATE</a>
            </div>
        </div>
    </section>

    <section class="footer">
        <h4>Sobre nós</h4>
        <p>O Tech Share é um projeto desenvolvido para que técnicos possam ter uma renda extra <br>
        enquanto se profissinalizam mais atendendo as dificuldades e necessidadeas dos usuários.</p>
        <div class="icons">
            <a class="cancela" href="mailto:Joaopedroalmeida2004@gmail.com?body=Olá, tenho uma dúvida!" target="_blank" class="hero-btn"><i class="fa fa-at"></i></a>
        </div>
        <p>Desenvolvido com <i class="fa fa-heart-o"></i> por João, Fabio e Jean.</p>
        <p>Nós <i class="fa fa-heart-o"></i> você, G.G.</p>
    </section>
    <script src="js/script.js"></script>
    <script src="js/funcoes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed(".auto-type",{
            strings: ["Programadores", "Manutentores", "Empreendedores", "o que precisar!"],
            typeSpeed: 150,
            backSpeed: 150,
            startDelay: 1000,
            backDelay: 1800,
            loop: true,

        })
    </script>
    <script>
        if(document.getElementById("preloader")) {
            const loader = document.getElementById("preloader");

                window.addEventListener("load", function(){
                loader.style.display = "none";
            })
        }
    </script>
</body>
</html>