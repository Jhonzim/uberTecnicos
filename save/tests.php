<?php
    include("../mysql_conection.php");
    
    $codigo = "SELECT * FROM Categoria_servico limit 21;";
    $result = $con->query($codigo);
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Owl-carousel Cards Slider | CodingNepal</title>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <link rel="stylesheet" href="../estilo.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
   </head>
   <body>
   <div class="slider owl-carousel">

   <?php
    while($res = $result->fetch_assoc()){
        
    
     echo  '<div class="card">
                <div class="img">
                <img src="../images/'.$res["Img"].'" alt="">
                </div>
                <div class="content">
                <div class="title">
                    '.$res["Tipo"].'
                </div>
                <div class="sub-title">
                    '.$res["Descricao"].'
                </div>
                <p style="text-align:center;">
                    '.$res["ID"].'
                </p>
                <div class="btn">
                    <button onclick=\'setPage("'.strtolower(str_replace(" ", "", $res["Tipo"])).'")\' class="button-user"value="'.$res["ID"].'" id="'.$res["ID"].'">Read more</button>
                </div>
            </div>
        </div>';
    }
    
    ?>
      
      </div>
      <form action="" method="post">
        <input type="text" name="ja" class="button">
        <button type="submit">aqui</button>
      </form>
      <script>
         $(".slider").owlCarousel({
           loop: true,
           autoplay: true,
           autoplayTimeout: 2000,
           autoplayHoverPause: true,
         });
      </script>
   </body>
   <script src="../script2.js"></script>
</html>