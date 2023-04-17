
    
    <form autocomplete="off" id="cadTec">
        <label for="cad_nome">Nome</label>
        <input type="text" class="input-box" name="cad_nome" placeholder="Seu nome" required>
        <label for="cad_email">Email</label>
        <input type="email" class="input-box" name="cad_email" placeholder="Seu endereço de email" required>
        <p id="email-error">Email já cadastrado! Insira outro email</p>
        <label for="cad_telefone">Celular</label>
        <input type="tel" class="input-box" name="cad_telefone" placeholder="(00) 00000-0000" maxlength="15" onkeyup="handlePhone(event)" required>
        <label for="cad_senha">Senha</label>
        <input type="password" class="input-box"name="cad_senha" placeholder="Sua senha" required>
        <p id="senha-error">A senha deve conter mais de 8 caracters</p>
        <label for="cad_endereco">Endereço</label>
        <input type="endereco" class="input-box" name="cad_endereco" placeholder="Seu endereço" >
        <label for="cad_cpf">CPF</label>
        <input type="text" class="input-box" name="cad_cpf" placeholder="Seu CPF" maxlength="14" onkeyup="handleCpf(event)" required>
        <label for="cad_curr">Currículo</label>
        <input type="file" class="input-box" name="curriculo" placeholder="Seu currículo " onchange="" >
        <button type="submit" class="submit-btn" placeholder="Seu nome de usuário" form="cadTec">Cadastrar-se</button>
    </form>
    