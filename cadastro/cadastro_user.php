                    
    <?php
        if(isset($_POST['cad_adress'])){
            $senha = ($_POST['cad_senha']);
            $nome = ($_POST['cad_nome']);
            $email = ($_POST['cad_email']);
            $endereco = ($_POST['cad_adress']);
            $cpf = ($_POST['cad_cpf']);
            
            $query= "INSERT INTO Usuario (Senha, Nome , Email, CPF, Endereco) values ('".$senha."', '".$nome."','".$email."', '".$cpf."', '".$endereco."')";


            $e = verificaEmail($con, $email, "Usuario");
            if($e){
                $retorno = $con->query($query) or die ("Não foi possivel a inseção de dados");
                echo("<script>window.alert('Cadastro concluido com sucesso');</script>");
                $valido = "";
                //echo("<script>window.setLocation='?i=forum');</script>")
                header("Location: menu.php?i=login&pag=login_user");
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
            <label for="cad_adress">Endereço</label>
            <input type="adress" class="input-box" name="cad_adress" placeholder="Seu endereço" required>
            <label for="cad_cpf">CPF</label>
            <input type="text" class="input-box" name="cad_cpf" placeholder="Seu CPF" required>
            <button type="submit" class="submit-btn" placeholder="Seu nome de usuário">Login</button>  
    </form>