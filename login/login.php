<?php

        $pagina_atual = "home";
        if(isset($_GET["pag"])){
            $pagina_atual = addslashes($_GET["pag"]);
        }
        switch ($pagina_atual) {
            case 'login_user' :
                include "setpagelogin.php";
                break;
            case 'login_tec':
                include "setpagelogin.php";
                break;
            default:
                include "home_login.php";
                break;
        }
    ?>