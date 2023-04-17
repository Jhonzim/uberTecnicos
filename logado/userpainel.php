<?php
  if(!isset($_SESSION)){
    session_start();
  }

?>

<!DOCTYPE html>
<html lang="pt-br" data-theme='light'>
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/possivellogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../eseseses.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Share</title>
   </head>
<body>
<header class="fixheader">
    <nav class="menu-header usu-header">
      <div class="boxheader">
        <a href="../index.php"><span data-tooltip="Voltar para página inicial"><img src="../images/logo3.png" alt="Nome do site" class="titulo-site"></a>
      </div>
        
      <div class="boxheader">
        <h1 class="indicador">Categorias</h1>
      </div>
        <div class="nav-links-menu boxheader">
        
            <ul>
                  
                <li>
                    <a href="./?id_page=1" id="list-servicos"><i class="fa fa-list"></i></a>
                </li>
                <li>
                    <a href="../cadservicos.php"><i class="fa fa-plus"></i></span></a>
                </li>
                <!--<li>
                    <a href="#" id="perfil" style="display: flex; line-height: 40px;"><img src="../images/retrato.png" alt="imagem-pessoal" id="img-user" style="width:40px; height:40px; border-radius:50%; align-self:center; margin-right: 10px;"><?php echo $_SESSION["user_nome"] ?? "Anônimo"; ?></a>
                </li>-->
                <?php
                    if(!isset($_SESSION["user_id"]) && !isset($_SESSION["tec_id"])){
                        echo "<li><a class='desativo-link links-menu' href='../?i=login' >LOGIN</a></li>
                        <li><a class='desativo-link links-menu cadastro-btn' href='../?i=cad' >CADASTRE-SE</a></li>";
                    }else{
                        if(isset($_SESSION["img_perfil"]) && $_SESSION["img_perfil"] != ""  && file_exists("../upload/".$_SESSION["img_perfil"])){
                            $href = $_SESSION["img_perfil"];
                        }else{
                            $href = "semimagem.png";
                        }
                        echo '<li><a href="./?id_page=5"><div class="tooltip"><img class="imgp" src="../upload/'.$href.'" alt=""></div></a></li>';
                    }
                ?>
                <i class="fa fa-sun" id="icon"></i>
            </ul>
        </div>
    </nav>
</header>
  <div class="usuario-body">
    <div class="container-usu">
      <input type="radio" name="dot" id="one" class="nodisplay">
      <input type="radio" name="dot" id="two" class="nodisplay">
      <input type="radio" name="dot" id="three" class="nodisplay">
      <div class="card-principal">
        <div class="cards">
          <div class="card-usu">
            <div class="conteudo">
              <div class="imagem">
                <img src="https://img.freepik.com/free-photo/man-assembling-circuit-board-laptop_1098-14260.jpg?w=2000&t=st=1675626337~exp=1675626937~hmac=ee2ca97913de07b86eda5cdc1286b559697e0d20e7cd5310a548e926e03a4435" alt="">
              </div>
              <div class="detalhes">
                <div class="nome">Manutenção de computadores e celulares</div>
                <div class="sobre">Hardware e Software</div>
              </div>
              <div class="icones">
                <a href="../cadservicos.php?type=1">Cadastrar serviço</a>
              </div>
            </div>
          </div>
          <div class="card-usu">
            <div class="conteudo">
              <div class="imagem">
                <img src="../images/programacaomobile.jpg" alt="">
              </div>
              <div class="detalhes">
                <div class="nome">Programação para dispositivos móveis</div>
                <div class="sobre">Celulares em geral</div>
              </div>
              <div class="icones">
                <a href="../cadservicos.php?type=2">Cadastrar serviço</a>
              </div>
            </div>
          </div>
          <div class="card-usu">
            <div class="conteudo">
              <div class="imagem">
                <img src="../images/redesdecomputadores.jpg" alt="">
              </div>
              <div class="detalhes">
                <div class="nome">Redes de computadores</div>
                <div class="sobre">Configuração e Manutenção</div>
              </div>
              <div class="icones">
                <a href="../cadservicos.php?type=3">Cadastrar serviço</a>
              </div>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="card-usu">
          <div class="conteudo">
            <div class="imagem">
              <img src="../images/inteligenciaartificial.jpg" alt="">
            </div>
            <div class="detalhes">
              <div class="nome">Inteligências artificiais</div>
              <div class="sobre">Para projetos inovadores</div>
            </div>
            <div class="icones">
              <a href="../cadservicos.php?type=4">Cadastrar serviço</a>
            </div>
          </div>
          </div>
          <div class="card-usu">
          <div class="conteudo">
            <div class="imagem">
              <img src="../images/programacaoparaweb.jpg" alt="">
            </div>
            <div class="detalhes">
              <div class="nome">Programação para web</div>
              <div class="sobre">Websites</div>
            </div>
            <div class="icones">
              <a href="../cadservicos.php?type=5">Cadastrar serviço</a>
            </div>
          </div>
          </div>
          <div class="card-usu">
          <div class="conteudo">
            <div class="imagem">
              <img src="../images/automacaodeprocessos.jpg" alt="">
            </div>
            <div class="detalhes">
              <div class="nome">Automação de processos</div>
              <div class="sobre">Automação e Mecânica</div>
            </div>
            <div class="icones">
              <a href="../cadservicos.php?type=6">Cadastrar serviço</a>
            </div>
          </div>
          </div>
        </div>
        <div class="cards">
          <div class="card-usu">
          <div class="conteudo">
            <div class="imagem">
              <img src="../images/desenvolvimentodejogos.jpg" alt="">
            </div>
            <div class="detalhes">
              <div class="nome">Desenvolvimento de Jogos</div>
              <div class="sobre">Para pessoas criativas</div>
            </div>
            <div class="icones">
              <a href="../cadservicos.php?type=7">Cadastrar serviço</a>
            </div>
          </div>
          </div>
          <div class="card-usu">
          <div class="conteudo">
            <div class="imagem">
              <img src="../images/engenheirodedados.jpg" alt="">
            </div>
            <div class="detalhes">
              <div class="nome">Engenheiro de dados</div>
              <div class="sobre">Deseja atualizar o seu conteúdo?</div>
            </div>
            <div class="icones">
              <a href="../cadservicos.php?type=8">Cadastrar serviço</a>
            </div>
          </div>
          </div>
          <div class="card-usu">
          <div class="conteudo">
            <div class="imagem">
              <img src="../images/servicoespecializado.jpg" alt="">
            </div>
            <div class="detalhes">
              <div class="nome">Serviço especializado</div>
              <div class="sobre">Não encontrou o que queria?</div>
            </div>
            <div class="icones">
              <a href="../cadservicos.php">Cadastrar serviço</a>
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="button-usu">
        <label for="one" class=" active one"></label>
        <label for="two" class="two"></label>
        <label for="three" class="three"></label>
      </div>
    </div>
  </div>
  <script src="../js/funcoes.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>
