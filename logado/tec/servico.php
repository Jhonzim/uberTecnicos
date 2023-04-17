<?php
    if(!isset($_SESSION)){
        session_start();
    }
    //include("../mysql_conection.php");
?>
<!DOCTYPE html >
<html lang="pt-br" data-theme='light'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/possivellogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Tech Share</title>
</head>
<body class="tecnico">
    <nav class="menu-header">
        <div class="button-back">
            <a href="./?id_page=3" class="back-button"><i class="fa-solid fa-arrow-left"></i></i></a>
            <div>
            <span data-tooltip="Voltar para página inicial"><a href="../index.php"><img src="../images/logo3.png" alt="Nome do site"class="titulo-site"></a>
            </div>
        </div>    
        <div class="boxheader">
            <h1 class="indicador">Detalhes do serviço</h1>
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
    <div class="container3">
        <div class="left-sidebar"> <!-- IMGS 1 por 1 -->
            <div class="imp-links">
                <h4 class="">Ordenar por</h4>
                <a href="?id_page=<?php echo $idPage_atual;?>&order=desc" class="links-imp">Mais novo</a>
                <a href="?id_page=<?php echo $idPage_atual;?>&order=asc" class="links-imp">Mais antigo</a>
                <form action="./?id_page=<?php echo $idPage_atual;?>" method="post" id="filter">
                    <select  id="select" class="filter-select" name="tipo">
                        <option disabled selected>Selecione:</option>
                        <?php
                            $queryCategoria = "SELECT * FROM Categoria_servico limit 21;";
                            $categorias = $con->query($queryCategoria);

                            $tipo = $_GET["type"];
                            while($res = $categorias->fetch_assoc()){
                                if($_POST["tipo"] == $res["ID"]){
                                    echo "<option value=".$res["ID"]." selected>".$res["Tipo"]."</option>";
                                }
                                else{
                                    echo "<option value=".$res["ID"].">".$res["Tipo"]."</option>";
                                }
                            }
                        ?>
                        <option>Outro</option>
                    </select>
                </form>
            </div>
            <div class="shortcut-links"> <!-- IMGS 1 por 1 -->
                <h4>Atalhos</h4>
                <a href="#">Histórico</a>
                <a href="#">Salvos</a>
            </div>
        </div>
        <main class="container4">
        <?php 
            if(isset($_GET["s"])){
                $idServico = $_GET["s"];
                $query = "SELECT * FROM Servico where ID = $idServico";
                $result = $con->query($query);
                $res = $result->fetch_assoc();
                if($res["Status"] != 1 && $res["id_Tecnico"] != $_SESSION["tec_id"]){
                    die("<p>Servico ja em negociaçao.<a href='?id_page=3'>Clique aqui para retornar</a></p>");
                }
        ?>
        
            <div class="left-column">
                <?php 
                    if(isset($res["Imagem"]) && $res["Imagem"] != ""){
                        echo '<img src="../upload/'.$res["Imagem"].'" alt="">';
                    }else{
                        echo '<img src="../images/servicosemimagem.jpg" alt="">';
                    }
                ?>
            </div>


            <div class="right-column">

                <div class="product-description">
                    <span><?php echo retornaCategoria($res["id_Categoria"], $con);?></span>
                    <h1><?php echo $res["Titulo"];?></h1>
                    <p class="semi-faint-text"><?php echo $res["Descricao"];?></p>
                </div> 
                
                <div class="product-configuration">
                    <h4>Detalhes</h4>
                    <div class="row spacearound">
                        <div class="column">
                            <div class="detalhe">
                                <i class="fa fa-wheelchair-move"></i>
                                Requer locomoção?
                            </div>
                            <div class="checkdetalhe">
                                <i class="<?php echo retornaLocomocao($res["Locomocao"]);?>"></i><!-- é pra ser variavel -->
                            </div>
                        </div>
                        <div class="column">
                            <div class="detalhe">
                                <i class="fa fa-calendar"></i>
                                Data Prevista
                            </div>
                            <div class="checkdetalhe">
                            <p><?php  
                                    if(isset($res["Previsao"])){
                                        echo date("Y-m-d", strtotime($res["Previsao"]));
                                    }else{
                                        echo "Não definida";
                                    }
                                ?></p><!-- é pra ser variavel -->
                            </div>
                        </div>
                        <div class="column">
                            <div class="detalhe">
                                <i class="fa fa-toolbox"></i>
                                Requer ferramentas?
                            </div>
                            <div class="checkdetalhe">
                                <i class="<?php echo retornaFerramenta($res['Ferramentas']);?>"></i><!-- é pra ser variavel -->
                            </div>
                        </div>
                    </div>
                    <div class="botoes-servico">
                        <?php
                            $queryTelUser = "SELECT usuario.Telefone FROM servico inner join usuario on servico.id_Usuario = usuario.ID WHERE servico.ID = $idServico";
                            
                            $numero = $con->query($queryTelUser);
		                    $num = $numero->fetch_assoc();
                            echo'<button onClick="conversaWats('.tirarCaracteresEspeciais($num["Telefone"]).')">
                                    Conversar
                                </button>';
                            
                            if($_SESSION["tec_id"] == $res["id_Tecnico"]){
                                echo '<button class="pedido-aceito botao-apagado">
                                        Aguardando confirmação
                                    </button>';  
                            }else{
                                echo '<button onClick="aceitarPedido('.$idServico.')">
                                        Aceitar
                                    </button>
                                    ';    
                            }
                                
                        ?>
                        
                    </div>
                </div>
            </div>
        <?php
            }else{
                echo"<h2 style='text-align:center;'>Serviço não encontrado</h2>";
            }
        ?>
        </main>
        <!-- <main class="container4">
        
            <div class="left-column">
                <img src="https://i.pinimg.com/736x/48/15/d5/4815d50cb6edf75b6785e798dc7ed9a4.jpg" alt="">
            </div>


            <div class="right-column">

                <div class="product-description">
                    <span>Manutenção</span>
                    <h1>Placa queimada</h1>
                    <p class="semi-faint-text">111Hoje à tarde a luz da minha casa caiu e voltou logo em seguida, e o pior, no período em que o PC estava ligado. Após isso, iniciei o micro normalmente, ele ligou sem maiores problemas, porém, passado alguns minutos a tela CONGELOU e deu uma leve retorcida e retângulos cinza apareceram. Após isso tentei reiniciar o PC mas nada de sinal de vídeo. Tive que ir pela onboard e restaurar o PC, pois o mesmo não quis mais iniciar o windows. Agora ele está restaurado, porém quando troco pra placa de vídeo NÃO recebo sinal no monitor. Fica todo escuro, mas eu consigo perceber que o windows inicia normalmente, até mesmo pelos sons que o pc faz quando carrega o windows, mas de sinal, não recebo NADA.</p>
                </div>

                <div class="product-configuration">

                    <div>
                        <h4>Detalhes</h4>
                        <p><i class="fa fa-wheelchair-move"></i>Requer locomoção? variavel aqui</p>
                        <p><i class="fa fa-calendar"></i>Prazo preferido: variavel aqui</p>
                        <p><i class="fa fa-toolbox"></i>Requer ferramentas? variavel aqui</p>
                    </div>

                </div>
            </div>
        </main> -->
    </div>
    <script src="../js/funcoes.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>