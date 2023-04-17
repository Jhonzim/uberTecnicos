
<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    $idPage_atual = 3;
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
    <div class="boxheader">
        <span data-tooltip="Voltar para página inicial"><a href="../index.php"><img src="../images/logo3.png" alt="Nome do site" class="titulo-site"></a>
    </div>
    
    <div class="boxheader">
        <h1 class="indicador">Todos os serviços</h1>
    </div>
    <div class="nav-links-menu boxheader">
        <ul>
            
            <div class="search-box2">
                <form action="?id_page=<?php echo $idPage_atual;?>" method="post" id="form-pesquisa" autocomplete="off">
                    <input type="text" name="pesquisa" placeholder="Pesquisar">
                    <i class="fa fa-magnifying-glass" id="button-pesquisa"></i>
                </form>
            </div>
        
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
                    <option value="">Todos</option>
                </select>
            </form>
        </div>
        <div class="shortcut-links"> <!-- IMGS 1 por 1 -->
            <h4>Atalhos</h4>
            <a href="#">Histórico</a>
            <a href="#">Salvos</a>
        </div>
    </div>

    <div class="main-content">
        <div class="products-container">
            <?php
                //include("../mysql_conection.php");
                $query = "SELECT * FROM Servico";
                if(isset($_POST["pesquisa"]) && $_POST["pesquisa"] != ""){
                    $query .= " WHERE Titulo LIKE '%".$_POST["pesquisa"]."%'";
                }
                if (isset($_POST["tipo"]) && $_POST["tipo"] != "") {
                    $query .= " WHERE id_Categoria = ".$_POST["tipo"];
                }
                if (isset($_GET["order"])) {
                    $query .= " ORDER BY Data_inicio ".$_GET["order"];
                }
                $request = $con->query($query) or die ($con->error);
                if($request->num_rows > 0){

                
                while($item = $request->fetch_assoc()){
                    //imagem
                    if(isset($item["Imagem"]) && $item["Imagem"] != ""){
                        $img = '<img src="../upload/'.$item["Imagem"].'" alt="">';
                    }else{
                        $img = '<img src="../images/servicosemimagem.jpg" alt="">';
                    }

                    echo '<div class="product" onclick="servSelecionado(\'id_page\',4,\'s\','.$item["ID"].')">
                    <h3>'.($item["Titulo"] != null ? $item["Titulo"] : "Sem título").'</h3>
                    '.$img.'
                    <h4>'.retornaDias($item["Data_inicio"], date("Y-m-d")).' Dias atrás - '.retornaCategoria($item["id_Categoria"], $con).'</h4>
                    </div>';
                };}else{
                    echo "<h2>Não possui serviços cadastrados ou em andamento</h2>";
                }
            ?>
        </div>
                
    </div>

</div>
    <script>
        function ativadorLinks(param, classe){
            const urlParams = new URLSearchParams(window.location.search);
            const getParam = urlParams.get(param);
            const myHref = "?"+param+"="+getParam 

            for (let i = 0; i < $(classe).length; i++) {
                const link = $(classe)[i];
                const href = link.getAttribute("href")
                if(href === myHref){
                    link.classList.remove("desativo-link-page")
                    link.classList.add("ativo-link-page")
                }else{
                    link.classList.remove("ativo-link-page")
                    link.classList.add("desativo-link-page")
                }
            };
        }
        if(document.querySelector(".imp-links")) ativadorLinks("i", ".links-imp")
    </script>
</body>

</html>