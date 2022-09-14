<?php

        if(isset($_POST['login_usersenha'])){
            echo "passei aqui 2";
            $senha = $_POST['login_usersenha'];
            $email = $_POST['login_useremail'];
            
            $query= "SELECT * FROM Usuario WHERE Email = '".$email."' AND Senha = '".$senha."'";
            $retorno = $con->query($query) or die ("Não foi possivel a inseção de dados");
            $linhas = $retorno->num_rows;

            if($linhas == 1){
                
                $usuario = $retorno->fetch_assoc();

                $_SESSION["user_id"] = $usuario["ID"];
                $_SESSION["user_senha"] = $usuario["Senha"];
                $_SESSION["user_nome"] = $usuario["Nome"];
                echo("<script>window.alert('loginastro concluido com sucesso');</script>");
                $valido = "";
                header("Location: logado.php?log=user");
            }
            else{
                $valido = "Email ou senha - inválidos";
                //header("Location: #");
            }
        }else{
            $valido = "";
        } 
        
    ?>
    <form action="" autocomplete="off" method="POST">
            <label for="login_useremail">Email</label>
            <input type="email" class="input-box" name="login_useremail" placeholder="Seu endereço de email" required>
            <label for="login_usersenha">Senha</label>
            <input type="password" class="input-box"name="login_usersenha" placeholder="Sua senha" required>
            <button type="submit" class="submit-btn" placeholder="Seu nome de usuário">Login</button>
            <div class="row">
                <hr class="hr">
                <p class="ou">OU</p>
                <hr class="hr">
            </div>

            <?php echo $valido;?>
    </form>