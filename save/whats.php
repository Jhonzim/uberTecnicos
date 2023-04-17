<!DOCTYPE html>
<!-- Criado por Guilherme - Aula de Tópicos Especiais -->
<!-- Uso de PHP, JavaScript, Html5, e CSS -->

<html>

<head>
  <title>Api do Whats</title>

<style type="text/css">

input {
  display: block;
  height: 22px;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 4px 10px;
}

</style>
</head>
<body>
   <?php
	function tirarCaracteresEspeciais($string){
		//Usa a função para padronizar a codificação da página
		$string = utf8_encode($string);
		//Trim retira os espaços vazios no começo e fim da variável
		$string = trim($string);
		//str_replace substitui um carácter por outro, nesse caso espaço por nada
		$string = str_replace(' ', '', $string);
		//Aqui substitui o underline por nada
		$string = str_replace('_', '', $string);
		//Aqui retira a barra
		$string = str_replace('/', '', $string);
		//Nessa linha o traço
		$string = str_replace('-', '', $string);
		//A abertura de parenteses
		$string = str_replace('(', '', $string);
		//O fechamento de parenteses
		$string = str_replace(')', '', $string);
		//O ponto
		$string = str_replace('.', '', $string);
		//No fim é retornado a variável com todas as alterações
    return $string;
}
	
	if(isset($_POST['n1'])) {
		$numero = $_POST['n1'];
		$conversao = tirarCaracteresEspeciais($numero);
		$pagina = "https://api.whatsapp.com/send?phone=55$conversao";
		//echo $pagina;
		header("Location: $pagina");
	};
  ?>

<script type="text/javascript">

const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
}
</script>

  <form method="post">
    Numero com DDD: <input type="tel" id="n1" name="n1" maxlength="15" onkeyup="handlePhone(event)"><br>
    <br>
	<br>
	<input type="submit" value="Abrir Whats">
  </form>

 
</body>

</html>