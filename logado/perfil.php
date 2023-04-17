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
    <header class="unselectable fixheader">
        <nav class="menu-header">
            <a href="#" class="back-button" onclick="history.back()" style="color: white;"><i class="fa-solid fa-arrow-left"></i></a>
            <a href="../index.php"><span data-tooltip="Voltar para página inicial"><img src="../images/logo3.png" alt="Nome do site"class="titulo-site"></a>
            <div class="nav-links-menu">
                <ul>
                    
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
                            echo '<li><a href="./?id_page=1"><i class="fa fa-list"></i></a>';
                        }
                    ?>
                    <li><i class="fa fa-sun" id="icon"></i></li>         
                </ul>
            </div>
        </nav>
    </header>
    <div class="perfil">
        <div class="containerp">
            <div class="boxp">
                <?php
                    if($perfil["Foto_pessoal"] != null  && file_exists("../upload/".$_SESSION["img_perfil"])){
                        echo "<img src='../upload/".$perfil["Foto_pessoal"]."' alt=''>";
                    }else{
                        echo "<a href='./?id_page=6'><img src='../upload/semimagem.png' alt=''></a>";
                    }
                       
                ?>
                <p><?php echo $perfil["Email"];?></p>
                <p><?php echo $perfil["Telefone"];?></p>
                <ul>
                    <li><?php echo $perfil["Nome"];?></li>
                    <li><?php echo $tipo;?></li>
                    <!--<li>Itaperuna</li>-->
                </ul>
            </div>
            <div class="aboutp">
                <div class="dets">
                    <h1>Detalhes</h1>
                    <div>
                        <a class="att" href="./?id_page=6">Atualizar Perfil</a>
                        <a class="att" href="../logout.php">Sair</a>
                    </div>
                </div>
                <ul>
                    <h3>Nome</h3>
                    <li><?php echo $perfil["Nome"];?></li>
                </ul>
                <ul>
                    <h3>E-mail</h3>
                    <li><?php echo $perfil["Email"];?></li>
                </ul>
                <ul>
                    <h3>Número</h3>
                    <li><?php echo $perfil["Telefone"];?></li>
                </ul>
                <!--<ul>
                    <h3>Estado</h3>
                    <li>Rio de Janeiro</li>
                </ul>
                <ul>
                    <h3>Cidade</h3>
                    <li>Itaperuna</li>
                </ul>-->
                <ul>
                    <h3>Endereço</h3>
                    <li><?php echo $perfil["Endereco"];?></li>
                </ul>
                <ul>
                    <h3>Atribuições<p>Opcional</p></h3>
                    <?php 
                        if($perfil["Bio"]){
                            echo "<p>".$perfil["Bio"]."<p>";
                        }else{
                            echo "<a href='./?id_page=6'>Crie sua Bio aqui!</a>";
                        }
                    ?>
                </ul>
                <ul>
                    <h3>Classificação</h3>
                    <?php
                        if($user == "tecnico"){
                            if($perfil["Classificacao"] == null){
                                echo "Não classificado";
                            }else{
                                echo $perfil["Classificacao"];
                            } 
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="interacoes">
        <div class="containeri">
            <div class="detinteracoes">
                <?php
                    $queryServicos = "SELECT * FROM servico where Status != 1 AND id_".ucfirst($user)." = ".$id;
                    $result2 = $con->query($queryServicos);
                    $qtdServicos = $result2->num_rows;
                    if($qtdServicos > 0){
                        while ($servico = $result2->fetch_assoc()) {
                            echo "<ul>
                                    <li>
                                        <h3><a href='./?id_page=2&s=".$servico["ID"]."' style='padding: 5px;'>".$servico["Titulo"]."</a><p>".date("d/m/Y",strtotime($servico["Data_inicio"]))."</p></h3>
                                        <p>".statusServico($servico["Status"])."</p>
                                    </li>
                                </ul>";
                        }
                    }else{
                            echo "<ul>
                                    <li>
                                        <h3><a href='#'>Sem servicos iniciados</a></h3>
                                    </li>
                                </ul>";
                    }

                    
                ?>
            </div>
            <!--<div class="detinteracoes">
                <h1>Interações</h1>
                <ul>
                    <li>
                        <h3><a href="#">Placa queimada</a><p>24/01/2023</p></h3>
                        <p>Solicitação de negociação aceita</p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h3><a href="#">Placa queimada</a><p>23/01/2023</p></h3>
                        <p>Solicitação de negociação enviada</p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h3><a href="#">Remoção de vírus</a><p>19/01/2023</p></h3>
                        <p>Solicitação de negociação enviada</p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h3><a href="#">Formatar computador</a><p>19/01/2023</p></h3>
                        <p>Solicitação de negociação enviada</p>
                    </li>
                </ul>
                <div class="il">
                    <i class="fa-solid il-b fa-circle-chevron-left"></i>
                    <i class="fa-solid il-b fa-circle-chevron-right"></i>
                </div>
            </div>-->
        </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="../js/funcoes.js"></script>
</body>
</html>