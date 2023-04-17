<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include("mysql_conection.php");
    
    $queryCategoria = "SELECT * FROM Categoria_servico limit 21;";
    $categorias = $con->query($queryCategoria);
    $queryPagamento = "SELECT * FROM Pagamento limit 21;";
    $pagamentos = $con->query($queryPagamento);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/possivellogo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
    <title>Tech Share</title>
</head>
<body>
<header class="unselectable fixheader">
        <nav class="menu-header">
            <a href="#" class="back-button" onclick="history.back()" style="color: white;"><i class="fa-solid fa-arrow-left"></i></a>
            <a href="index.php"><span data-tooltip="Voltar para página inicial"><img src="images/logo3.png" alt="Nome do site"class="titulo-site"></a>
            <div class="nav-links-menu">
                <ul>
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
                        echo '<li><a href="logado/?id_page=5"><div class="tooltip"><img class="imgp" src="./upload/'.$href.'" alt=""></div></a></li>';
                    }
                    ?>
                    <li><i class="fa fa-sun" id="icon"></i></li>         
                </ul>
            </div>
        </nav>
    </header>
   <section class="formularioo">
    <div class="container2">
        <header>Explique sua necessidade<br>E crie seu contrato</header>
        <form action="" id="cadServico" enctype="multipart/form-data" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Detalhes específicos</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                           <label>O serviço requere a locomoção do técnico?</label>
                           <label class="faint-text">Se sim, o seu endereço será compartilhado</label>
                           <label><input type="radio" name="locomocao" value="1">Sim</label>
                           <label><input type="radio" name="locomocao" value="2">Não</label>
                           <label><input type="radio" name="locomocao" value="3">Não sei</label>
                        </div>
                        <div class="input-field">
                           <label>Para quando precisa do serviço?</label>
                           <label class="faint-text">Liste sua urgência</label>
                           <label><input type="radio" name="quando" value="1">Hoje ou até uma semana</label>
                           <label><input type="radio" name="quando" value="2">Até o próximo mês</label>
                           <label><input type="radio" name="quando" value="3">Até os próximos três meses ou mais</label>
                        </div>
                        <div class="input-field">
                           <label>O serviço requer ferramentas?</label>
                           <label class="faint-text">Se sim, as especifique na descrição</label>
                           <label><input type="radio" name="ferramentas" value="1">Sim</label>
                           <label><input type="radio" name="ferramentas" value="2">Não</label>
                           <label><input type="radio" name="ferramentas" value="3">Não sei</label>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Detalhes do serviço</span>
                    <hr>
                    <div class="fields-textarea">
                        <div class="fields-2">
                            <div class="input-field">
                                <label for="select">Qual o tipo de serviço?</label> <!--COLOCAR EM ORDEM ALFABÉTICA-->
                                <select  id="select" name="tipo">
                                    <option disabled selected>Selecione:</option>
                                    <?php
                                        $tipo = $_GET["type"];
                                        while($res = $categorias->fetch_assoc()){
                                            if($tipo == $res["ID"]){
                                                echo "<option value=".$res["ID"]." selected>".$res["Tipo"]."</option>";
                                            }
                                            else{
                                                echo "<option value=".$res["ID"].">".$res["Tipo"]."</option>";
                                            }
                                        }
                                    ?>
                                    <option>Outro</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Título</label>
                                <input type="text" placeholder="Tela desligando" maxlength="20" name="titulo" autocomplete="off">
                            </div>
                            <div class="input-field">
                                <label style="select">Qual o método de pagamento?</label> <!--COLOCAR EM ORDEM ALFABÉTICA-->
                                <select  id="select" name="pagamento">
                                    <option disabled selected>Selecione:</option>
                                    <?php
                                        while($res = $pagamentos->fetch_assoc()){
                                            echo "<option value=".$res["Id"].">".$res["Tipo"]."</option>";
                                        }
                                    ?>
                                    <option>Outro</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Imagem</label>
                                <label for="imagem">Enviar...</label>
                                <input style="display: none"type="file" name="imagem" id="imagem">
                            </div>
                        </div>
                        <div class="input-field textarea">
                           <label>Descrição do requerimento</label>
                           <textarea name="descricao" id="" cols="30"></textarea>
                        </div>
                    </div>
                    

                    <!--<button class="nextBtn" type="button">
                        <span class="btnText">Next</span>
                        <i class="fa-solid fa-paper-plane" style="transform: rotate(47deg)"></i>
                    </button>-->
                    <button class="sumbit" form="cadServico">
                        <span class="btnText">Enviar</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>
        </section>
    <script src="js/script.js"></script>
    <script src="js/funcoes.js"></script>
</body>
</html>

            <!--<div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Address Type</label>
                            <input type="text" placeholder="Permanent or Temporary" >
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" placeholder="Enter nationality" >
                        </div>
                        <div class="input-field">
                            <label>State</label>
                            <input type="text" placeholder="Enter your state" >
                        </div>
                        <div class="input-field">
                            <label>District</label>
                            <input type="text" placeholder="Enter your district" >
                        </div>

                        <div class="input-field">
                            <label>Block Number</label>
                            <input type="number" placeholder="Enter block number" >
                        </div>
                        <div class="input-field">
                            <label>Ward Number</label>
                            <input type="number" placeholder="Enter ward number" >
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">Family Details</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Father Name</label>
                            <input type="text" placeholder="Enter father name" >
                        </div>
                        <div class="input-field">
                            <label>Mother Name</label>
                            <input type="text" placeholder="Enter mother name" >
                        </div>
                        <div class="input-field">
                            <label>Grandfather</label>
                            <input type="text" placeholder="Enter grandfther name" >
                        </div>
                        <div class="input-field">
                            <label>Spouse Name</label>
                            <input type="text" placeholder="Enter spouse name" >
                        </div>
                        <div class="input-field">
                            <label>Father in Law</label>
                            <input type="text" placeholder="Father in law name" >
                        </div>
                        <div class="input-field">
                            <label>Mother in Law</label>
                            <input type="text" placeholder="Mother in law name" >
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>

   <div class="input-field">
         <label>O serviço precisa de ferramentas?</label>
         <select required>
            <option disabled selected>Selecione:</option>
            <option>Male</option>
            <option>Female</option>
            <option>Others</option>
         </select>
   </div>
-->