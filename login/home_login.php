<?php
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_SESSION["user_id"]) || isset($_SESSION["tec_id"])) {
            header("Location: logado.php");
            die();
        }
?>

<main>
    <div class="cadastro-home">
        
        <h2>Realize seu login e faça parte deste projeto</h2>
        <div class="areas">
            <div class="areas-selecao">
                <h3>Usuário</h3>
                <p class="text-selecao">Deseja receber serviços que vão te ajudar a resolver problemas ou que vão atender a pedidos para melhorar o seu conforto e descanso.</p>
                <a href="?i=login&pag=login_user">Logar como usuário <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="areas-selecao">
                <h3>Técnico</h3>
                <p class="text-selecao">Gostaria de trabalhar conosco como um profissional qualificado da área de TI? Tem formação ou está em período de estágio? Faça seu cadastro para nos ajudarmos.</p>
                <a href="?i=login&pag=login_tec">Logar como técnico <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</main>