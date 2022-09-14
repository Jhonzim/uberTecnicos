    <?php
        
        if(isset($_POST['cad_endereco'])){
            echo "passei aqui";
            $senha = ($_POST['cad_senha']);
            $nome = ($_POST['cad_nome']);
            $email = ($_POST['cad_email']);
            $endereco = ($_POST['cad_endereco']);
            $cpf = ($_POST['cad_cpf']);
            
            $query= "INSERT INTO Tecnico (Senha, Nome , Email, CPF, Endereco) values ('".$senha."', '".$nome."','".$email."', '".$cpf."', '".$endereco."')";
            unset($_POST["cad_endereco"]);

            $e = verificaEmail($con, $email, "Tecnico");
            if($e){
                $retorno = $con->query($query) or die ("Não foi possivel a inseção de dados");
                echo("<script>window.alert('Cadastro concluido com sucesso');</script>");
                $valido = "";
                //echo("<script>window.setLocation='?i=forum');</script>")
            }
            else{
                $valido = " - Email inválido";
                //header("Location: #");
            }
        }else{
            $valido = "";
        } 
        
    ?>
    
    <form action="" autocomplete="off" method="POST">
            <label for="cad_nome">Nome</label>
            <input type="text" class="input-box" name="cad_nome" placeholder="Seu nome" required>
            <label for="cad_email">Email<?php echo $valido;?></label>
            <input type="email" class="input-box" name="cad_email" placeholder="Seu endereço de email" required>
            <label for="cad_senha">Senha</label>
            <input type="password" class="input-box"name="cad_senha" placeholder="Sua senha" required>
            <label for="cad_eendereco">Endereço</label>
            <input type="endereco" class="input-box" name="cad_endereco" placeholder="Seu endereço" >
            <label for="cad_cpf">CPF</label>
            <input type="text" class="input-box" name="cad_cpf" placeholder="Seu CPF" required>
            <label for="cad_curr">Currículo</label>
            <input type="file" class="input-box" name="cad_curr" placeholder="Seu currículo" >
            <button type="submit" class="submit-btn" placeholder="Seu nome de usuário">Login</button>
    </form>