
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
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../images/possivellogo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Tech Share</title>
</head>
<body class="tecnico">
    <nav class="menu-header">
        <div class="button-back boxheader">
            <a href="./?id_page=1" class="back-button"><i class="fa-solid fa-arrow-left"></i></a>
            <a href="../index.php"><span data-tooltip="Voltar para página inicial"><img src="../images/logo3.png" alt="Nome do site"class="titulo-site"></a>
        </div>
        <div class="boxheader">
            <h1 class="indicador">Detalhes do serviço</h1>
        </div>
        <div class="nav-links-menu boxheader">
            <ul>
            <div class="search-box2">
                <form action="?id_page=<?php echo $idPage_atual;?>" method="post" id="form-pesquisa">
                    <input type="text" name="pesquisa" value="<?php echo $_POST["pesquisa"] ?? "";?>" placeholder="Pesquisar">
                    <i class="fa fa-magnifying-glass" id="button-pesquisa"></i>
                </form>
            </div>
                
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
                <a href="?i=Adcde" class="links-imp">Mais novo</a>
                <a href="?i=Fgh" class="links-imp">Mais antigo</a>
                <form action="#">
                    <select name="categorias" id="categorias">
                        <option style="display:none">Categoria</option>
                        <option value="">Todas</option>
                        <option value="">Programação</option>
                        <option value="">Manutenção</option>
                        <option value="">Instalação</option>
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
                $queryServico = "SELECT * From servico Where Id = $idServico";
                $result = $con->query($queryServico);
                $servico = $result->fetch_assoc();
        ?>
            <div class="left-column">
            <?php 
                if(isset($servico["Imagem"]) && $servico["Imagem"] != ""){
                    echo '<img src="../upload/'.$servico["Imagem"].'" alt="">';
                }else{
                    echo '<img src="../images/servicosemimagem.jpg" alt="">';
                }
            ?>
                
            </div>


            <div class="right-column">

                <div class="product-description">
                    <span><?php echo retornaCategoria($servico["id_Categoria"], $con);?></span>
                    <h1><?php echo $servico["Titulo"];?></h1>
                    <p class="semi-faint-text"><?php echo $servico["Descricao"];?></p>
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
                                <i class="<?php echo retornaLocomocao($servico["Locomocao"]);?>"></i><!-- é pra ser variavel -->
                            </div>
                        </div>
                        <div class="column">
                            <div class="detalhe">
                                <i class="fa fa-calendar"></i>
                                Data prevista
                            </div>
                            <div class="checkdetalhe">
                                <p><?php  
                                    if(isset($servico["Previsao"])){
                                        echo date("Y-m-d", strtotime($servico["Previsao"]));
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
                                <i class="<?php echo retornaFerramenta($servico['Ferramentas']);?>"></i><!-- é pra ser variavel -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="botoes-servico">
                        
                        <?php
                            $idServico = $_GET["s"];
                            $queryServico = "SELECT * From servico Where Id = $idServico";
                            $result = $con->query($queryServico);
                            $servico = $result->fetch_assoc();
                            if($servico["id_Tecnico"] == ''){
                                echo "<button class='botao-apagado'>
                                        Aguardando aceitação de algum técnico
                                    </button>";
                            }
                            if($servico["id_Tecnico"] != '' && $servico["id_Tecnico"] != null){
                                $queryTecnico = "SELECT * From tecnico Where ID = ".$servico["id_Tecnico"];
                                $queryClassificacoes = "SELECT Classificacao From servico Where id_Tecnico = ".$servico["id_Tecnico"]." AND Classificacao != 0";
                                $classificacoes = $con->query($queryClassificacoes);
                                $tecnico = $con->query($queryTecnico);
                                $tec = $tecnico->fetch_assoc();
                                echo "<button onClick='conversaWats(".tirarCaracteresEspeciais($tec["Telefone"]).")'>
                                    Conversar
                                </button>";
                            }
                            if($servico["Status"] == 2){
                                echo "<button onclick='confirmarPedido($idServico)'>
                                        Confirmar
                                    </button>
                                    <button onclick='cancelarPedido($idServico)'>
                                        Cancelar
                                    </button>";
                            }
                            if ($servico['Status'] == 3 && $servico["status_Usuario"] == 1){ //&& $_SESSION["user_id"] == $servico["id_Usuario"]) {
                                echo "<button onclick='finalizarPedido(".$idServico.")'>
                                    Finalizar serviço
                                </button>";
                            }else if($servico['Status'] == 3 && $servico['status_Usuario'] == 2){
                                echo "
                                        <button class='botao-apagado'>
                                            Aguardando finalização do técnico
                                        </button>
                                    ";
                            }else if($servico['Status'] == 4 && $servico["Classificacao"] == 0){
                                echo "
                                        <button onclick='classificaTecnico(".$tec["ID"].",".$idServico.")'>
                                            Classificar tecnico
                                        </button>
                                    ";
                            }
                            
                        ?>                 
                    </div>
                    <div class="mini-perfil-tec">
                        <div class="mini-perfil-img">
                            <?php
                            if($servico["id_Tecnico"] != ""){
                                $numRows = $classificacoes->num_rows;
                                $soma = 0;
                                while($class = $classificacoes->fetch_assoc()){
                                    if($class["Classificacao"] != null && $class["Classificacao"] != null){
                                        $soma .= $class["Classificacao"];
                                    } 
                                }
                                if($soma != 0 && $numRows != 0){
                                    $soma = intval($soma/$numRows);
                                }
                                
                                

                                if($tec["Foto_pessoal"] != "" && file_exists("../upload/".$tec["Foto_pessoal"])){
                                    $imgtec = $tec["Foto_pessoal"];
                                }else{
                                    $imgtec = "semimagem.png";
                                }
                                echo '<img class="imgp" src="../upload/'.$imgtec.'" alt="">';
                            
                            ?>
                            <img src="" alt="">
                        </div>
                        <div class="mini-perfil-txt">
                            <div class="star-classification">

                                <i class="fa fa-star star-class" id="star-1"></i>
                                <i class="fa fa-star star-class" id="star-2"></i>
                                <i class="fa fa-star star-class" id="star-3"></i>
                                <i class="fa fa-star star-class" id="star-4"></i>
                                <i class="fa fa-star star-class" id="star-5"></i>

                                <script>
                                    function starsClassification(value){
                                        if(value == 1){
                                            $("#star-1").css("color", "gold");
                                            $("#star-1").css("opacity", "1");

                                            $("#star-2").css("color", "gold");
                                            $("#star-2").css("opacity", "0.4");

                                            $("#star-3").css("color", "gold");
                                            $("#star-3").css("opacity", "0.4");

                                            $("#star-4").css("color", "gold");
                                            $("#star-4").css("opacity", "0.4");

                                            $("#star-5").css("color", "gold");
                                            $("#star-5").css("opacity", "0.4");
                                        }else if(value == 2){
                                            $("#star-1").css("color", "gold");
                                            $("#star-1").css("opacity", "1");
                                            
                                            $("#star-2").css("color", "gold");
                                            $("#star-2").css("opacity", "1");

                                            $("#star-2").css("opacity", "0.4");
                                            $("#star-3").css("color", "inherit");
                                            $("#star-3").css("opacity", "0.4");
                                            $("#star-4").css("color", "inherit");
                                            $("#star-4").css("opacity", "0.4");
                                            $("#star-5").css("color", "inherit");
                                            $("#star-5").css("opacity", "0.4");
                                        }else if(value == 3){
                                            $("#star-1").css("color", "gold");
                                            $("#star-1").css("opacity", "1");

                                            $("#star-2").css("color", "gold");
                                            $("#star-2").css("opacity", "1");

                                            $("#star-3").css("color", "gold");
                                            $("#star-3").css("opacity", "1");

                                            $("#star-4").css("color", "inherit");
                                            $("#star-4").css("opacity", "0.4");
                                            $("#star-5").css("color", "inherit");
                                            $("#star-5").css("opacity", "0.4");
                                        }else if(value == 4){
                                            $("#star-1").css("color", "gold");
                                            $("#star-1").css("opacity", "1");

                                            $("#star-2").css("color", "gold");
                                            $("#star-2").css("opacity", "1");

                                            $("#star-3").css("color", "gold");
                                            $("#star-3").css("opacity", "1");

                                            $("#star-4").css("color", "gold");
                                            $("#star-4").css("opacity", "1");

                                            $("#star-5").css("color", "inherit");
                                            $("#star-5").css("opacity", "0.4");
                                        }else if(value == 5){
                                            $("#star-1").css("color", "gold");
                                            $("#star-1").css("opacity", "1");

                                            $("#star-2").css("color", "gold");
                                            $("#star-2").css("opacity", "1");

                                            $("#star-3").css("color", "gold");
                                            $("#star-3").css("opacity", "1");

                                            $("#star-4").css("color", "gold");
                                            $("#star-4").css("opacity", "1");

                                            $("#star-5").css("color", "gold");
                                            $("#star-5").css("opacity", "1");
                                        }
                                         if (value == 0 || value == null) {
                                            $("#star-1").css("color", "inherit");
                                            $("#star-1").css("opacity", "0,4");
                                            $("#star-2").css("color", "inherit");
                                            $("#star-2").css("opacity", "0.4");
                                            $("#star-3").css("color", "inherit");
                                            $("#star-3").css("opacity", "0.4");
                                            $("#star-4").css("color", "inherit");
                                            $("#star-4").css("opacity", "0.4");
                                            $("#star-5").css("color", "inherit");
                                            $("#star-5").css("opacity", "0.4");
                                         }
                                    }
                                    starsClassification('<?php echo $soma;?>');
                                </script>
                            </div>
                            <p><?php echo $tec["Nome"]?></p>
                            <p class="p-bio"><?php
                                if($tec["Bio"] != ""){
                                    echo $tec["Bio"]."</p>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }else{
                echo"<h2 style='text-align:center;'>Serviço não encontrado</h2>";
            }
        ?>
        </main>
    </div>
    <script src="../js/funcoes.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>