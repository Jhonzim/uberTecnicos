<?php
    include("mysql_conection.php");
    if(isset($_POST["descricao"])){
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $img = $_POST["img"];

        $query = "INSERT INTO Categoria_servico (Tipo, Descricao, Img) values ('$tipo', '$descricao', '$img')";
        $resultado = $con->query($query);
        if($resultado){
            echo "  <table border='1'>
                        <tr>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Img nome</th>
                        </tr>
                        <tr>
                            <td>$tipo</td>
                            <td>$descricao</td>
                            <td>$img</td>
                        </tr>
                    </table>";
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="tipo" placeholder="Tipo">
        <textarea id="story" name="descricao"
          rows="5" cols="33" placeholder="Descrição"></textarea>
        <input type="text" name="img">
        
        <input type="submit" value="submit">
    </form>
    <a href="logado/userpainel.php">user</a>
</body>
</html>