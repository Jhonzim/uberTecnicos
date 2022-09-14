    <?php
        $pagina_atual = "home";
        if(isset($_GET["pag"])){
            $pagina_atual = addslashes($_GET["pag"]);
        }
        switch ($pagina_atual) {
            case 'cad_user' :
                include "setpagecad.php";
                break;
            case 'cad_tec':
                include "setpagecad.php";
                break;
            default:
                include "home_cad.php";
                break;
        }
    ?>