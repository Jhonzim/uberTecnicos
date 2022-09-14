<?php
        if(isset($_POST['login_tecemail'])){
            echo "passei aqui";
            $senha = ($_POST['login_tecsenha']);
            $email = ($_POST['login_tecemail']);
            
            $query= "SELECT * FROM Tecnico WHERE Email = '".$email."' AND Senha = '".$senha."'";
            $retorno = $con->query($query) or die ("Não foi possivel a inseção de dados");
            $linhas = $retorno->num_rows;

            if($linhas == 1){
                
                $usuario = $retorno->fetch_assoc();

                $_SESSION["tec_id"] = $usuario["ID"];
                $_SESSION["tec_senha"] = $usuario["Senha"];
                $_SESSION["tec_nome"] = $usuario["Nome"];
                echo("<script>window.alert('Login concluido com sucesso');</script>");
                $valido = "";
                header("Location: logado.php?log=tec");
                //echo("<script>window.setLocation='?i=forum');</script>")
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
            <label for="login_tecemail">Email</label>
            <input type="email" class="input-box" name="login_tecemail" placeholder="Seu endereço de email" required>
            <label for="login_tecsenha">Senha</label>
            <input type="password" class="input-box"name="login_tecsenha" placeholder="Sua senha" required>
            <button type="submit" class="submit-btn" placeholder="Seu nome de usuário">Login</button>  
            <?php echo $valido?>
    </form>
    