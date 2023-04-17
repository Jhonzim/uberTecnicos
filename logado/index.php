


<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include("../mysql_conection.php");

        if(isset($_SESSION["user_id"])){
            if(isset($_GET["id_page"])){
                $idPage = $_GET["id_page"];
                switch ($idPage) {
                    case 1:
                        include("user/userservicos.php");
                        break;
                    case 2:
                        include("user/userservico.php");
                        break;
                    case 5:
                        include("perfil.php");
                        break;
                    case 6:
                        include("config_perfil.php");
                        break;
                    default:
                        include("notfound.php");
                        break;
                }
            }
            
        }else if(isset($_SESSION["tec_id"])){
            if(isset($_GET["id_page"])){
                $idPage = $_GET["id_page"];
                switch ($idPage) {
                    case 1:
                        include("tec/tecservicos.php");
                        break;
                    case 2:
                        include("tec/tecservico.php");
                        break;
                    case 3:
                        include("tec/allservicos.php");
                        break;
                    case 4:
                        include("tec/servico.php");
                        break;
                    case 5:
                        include("perfil.php");
                        break;
                    case 6:
                        include("config_perfil.php");
                        break;
                    default:
                        include("notfound.php");
                        break;
                }
            }
        }else{
            echo "Faça login para continuar";
        }
    ?>
<script src="../js/funcoes.js"></script>
<script src="../js/script.js"></script>