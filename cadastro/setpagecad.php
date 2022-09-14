<?php
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION["user_id"]) || isset($_SESSION["tec_id"])) {
            header("Location: logado.php");
            die();
        }
    include "funcoes.php";
    include("mysql_conection.php");
    isset($_GET['pag']) ? $pagina = $_GET['pag'] : $pagina = "home"; 
?>
<div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>CADASTRO - <?php echo retornaNameForm1("pag","cad_user","Usuário","Técnico");?></h2>
                    <?php
                        switch ($pagina) {
                            case 'cad_user':
                                include "cadastro_user.php";
                                break;
                            case 'cad_tec':
                                include "cadastro_tec.php";
                                break;
                            default:
                                header("Location: menu.php?i=cad");
                                break;
                        }
                    ?>
                    <button type="button" class="btn" onclick="IrTecnico()"><?php echo retornaNameForm1("pag","cad_user","Sou Técnico","Sou Usuário");?></button>
                    <a href="#" >Esqueci minha senha</a>
                </div>
                <div class="card-back">
                    <h2>Cadastro - <?php echo retornaNameForm2("pag","cad_user","Usuário","Técnico");?></h2>
                    <?php
                        switch ($pagina) {
                            case 'cad_user':
                                include "cadastro_tec.php";
                                break;
                            case 'cad_tec':
                                include "cadastro_user.php";
                                break;
                            default:
                                header("Location: menu.php?i=cad");
                                break;
                        }
                    ?>
                    <button type="button" class="btn" onclick="IrUsuario()"><?php echo retornaNameForm2("pag","cad_user","Sou Técnico","Sou Usuário");?></button>
                    <a href="#">Esqueci minha senha</a>
                </div>
            </div>
        </div>
    </div>
