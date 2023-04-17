<?php
    $tecPage = "testtest.php";
    header('Access-Control-Allow-Origin: *'); 
    date_default_timezone_set("America/Sao_Paulo");
    $host='localhost';
    $bd='tcc';
    $user='root';
    $pwd='';
   
    $con = new mysqli($host, $user, $pwd, $bd) or die ('Impossivel abrir esta base de dados');
    
    function verificaEmail($cone, $var, $tabela){
        $code = "SELECT * FROM ".$tabela." WHERE Email = '".$var."'";
        $result = $cone->query($code) or die ("Não foi possivel a inseção de dados");
        $linhas = $result->num_rows;
        if($linhas == 0){
            return true;
        }
        else{
            return false;
        }
    }
    function retornaUrgencia($id){
        if($id == 1){
            return "Hoje ou até uma semana";
        }
        if($id == 2){
            return "Até o próximo mês";
        }
        if($id == 3){
            return "Até os próximos três meses ou mais";
        }
        else{
            return "Não encontrado";
        }
    }
    function statusServico($status){
        switch ($status) {
            case 1:
                return "Serviço pendente";
                break;
            case 2:
                return "Serviço aceito pelo técnico";
                break;
            case 3:
                return "Serviço em andamento";
                break;
            case 4:
                return "Serviço finalizado";
                break;
            default:
                return "Status não encontrado";
                break;
        }
    }
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
function retornaCategoria($idCategoria, $cone){
    $query = "SELECT Tipo from categoria_servico where ID = $idCategoria";
    $result = $cone->query($query);
    $servico = $result->fetch_assoc();
    $categoria = $servico["Tipo"];
    return $categoria;
}
function retornaLocomocao($id){
    switch ($id) {
        case 1:
            return "fa fa-solid fa-check";
            break;
        case 2:
            return "fa fa-xmark";
            break;
        case 2:
            return "fa-solid fa-exclamation";//colocar o de não sei
            break;
        default:
            return "fa-solid fa-exclamation";//colocar o de não sei
            break;
    }
}
function retornaFerramenta($id){
    switch ($id) {
        case 1:
            return "fa fa-solid fa-check";
            break;
        case 2:
            return "fa fa-xmark";
            break;
        case 2:
            return "fa-solid fa-exclamation";//colocar o de não sei
            break;
        default:
            return "fa-solid fa-exclamation";//colocar o de não sei
            break;
    }
}
function retornaDias($vInicial, $vFinal){
    $data1 = strtotime($vInicial);
    $data2 = strtotime($vFinal);

    $diferenca = abs(intval(($data2-$data1)/86400));
    return $diferenca;
}
?>