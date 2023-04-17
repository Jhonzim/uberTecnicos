<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include("mysql_conection.php");
    
    $codigo = "SELECT * FROM Categoria_servico limit 21;";
    $result = $con->query($codigo);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/possivellogo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/615f81d243.js" crossorigin="anonymous"></script>
</head>
<body>
   <section class="formularioo">
    <div class="container2">
        <header>Explique o que você precisa<br>E inquira seu contrato</header>

        <form action="#" >
            <div class="form first">
                <div class="details personal">
                    <span class="title">Detalhes pessoais</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                           <label>O serviço requere a locomoção do técnico?</label>
                           <label class="faint-text">Se sim, o seu endereço será compartilhado</label>
                           <label><input type="radio" name="locomocao" value="SIM">Sim</label>
                           <label><input type="radio" name="locomocao" value="NAO">Não</label>
                           <label><input type="radio" name="locomocao" value="NAO">Não sei</label>
                        </div>
                        <div class="input-field">
                           <label>Para quando precisa do serviço?</label>
                           <label class="faint-text">Liste sua urgência</label>
                           <label><input type="radio" name="quando" value="semana">Hoje ou até uma semana</label>
                           <label><input type="radio" name="quando" value="mes">Até o próximo mês</label>
                           <label><input type="radio" name="quando" value="meses">Até os próximos três meses ou mais</label>
                        </div>
                        <div class="input-field">
                           <label>O serviço requere ferramentas?</label>
                           <label class="faint-text">Se sim, as especifique na descrição</label>
                           <label><input type="radio" name="ferramentas" value="SIM">Sim</label>
                           <label><input type="radio" name="ferramentas" value="NAO">Não</label>
                           <label><input type="radio" name="ferramentas" value="NAO">Não sei</label>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Detalhes do serviço</span>
                    <hr>
                    <div class="fields-textarea">
                        <div class="fields-2">
                            <div class="input-field">
                                <label for="select">Qual o tipo de serviço?</label> <!--COLOCAR EM ORDEM ALFABÉTICA-->
                                <select  id="select">
                                    <option disabled selected>Selecione:</option>
                                    <?php
                                        while($res = $result->fetch_assoc()){
                                        echo "<option id=".$res["ID"].">".$res["Tipo"]."</option>";}
                                    ?>
                                    <option>Outro</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Número de telefone</label>
                                <input type="number" >
                            </div>
                            <div class="input-field">
                                <label>Issued Authority</label>
                                <input type="text" placeholder="Enter issued authority" >
                            </div>
                            <div class="input-field">
                                <label>Issued Date</label>
                                <input type="date" placeholder="Enter your issued date" >
                            </div>
                        </div>
                        <div class="input-field textarea">
                           <label>Descrição do requerimento</label>
                           <textarea name="descricao" id="" cols="30"></textarea>
                        </div>
                    </div>
                    

                    <button class="nextBtn" type="button">
                        <span class="btnText">Next</span>
                        <i class="fa-solid fa-paper-plane" style="transform: rotate(47deg)"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Address Type</label>
                            <input type="text" placeholder="Permanent or Temporary" >
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" placeholder="Enter nationality" >
                        </div>
                        <div class="input-field">
                            <label>State</label>
                            <input type="text" placeholder="Enter your state" >
                        </div>
                        <div class="input-field">
                            <label>District</label>
                            <input type="text" placeholder="Enter your district" >
                        </div>

                        <div class="input-field">
                            <label>Block Number</label>
                            <input type="number" placeholder="Enter block number" >
                        </div>
                        <div class="input-field">
                            <label>Ward Number</label>
                            <input type="number" placeholder="Enter ward number" >
                        </div>
                    </div>
                </div>

                <div class="details family">
                    <span class="title">Family Details</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Father Name</label>
                            <input type="text" placeholder="Enter father name" >
                        </div>
                        <div class="input-field">
                            <label>Mother Name</label>
                            <input type="text" placeholder="Enter mother name" >
                        </div>
                        <div class="input-field">
                            <label>Grandfather</label>
                            <input type="text" placeholder="Enter grandfther name" >
                        </div>
                        <div class="input-field">
                            <label>Spouse Name</label>
                            <input type="text" placeholder="Enter spouse name" >
                        </div>
                        <div class="input-field">
                            <label>Father in Law</label>
                            <input type="text" placeholder="Father in law name" >
                        </div>
                        <div class="input-field">
                            <label>Mother in Law</label>
                            <input type="text" placeholder="Mother in law name" >
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>