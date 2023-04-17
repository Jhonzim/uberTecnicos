// Parte de cadastro com AJAX
$("#cadUser").on("submit",function(event){
    event.preventDefault();
    let data = $(this).serialize();
    $("#email-error").css("display","none");
    $("#senha-error").css("display","none");
    $.ajax({
        type: "post",
        url: "ajax/cad_user.php",
        data: data,
        dataType: "json",
        success: function (response) {
            if(response === "email_error"){
                $("#email-error").css("display","block");
            }else if(response === "senha_error"){
                $("#senha-error").css("display","block");
            }else if(response === "certo"){
                window.location.href ="menu.php?i=login&pag=login_user";
            }
        }
    });
    
})

$("#cadTec").on("submit",function(event){
    event.preventDefault();
    let data = new FormData(this);
    $("#email-error").css("display","none");
    $("#senha-error").css("display","none");
    $.ajax({
        type: "post",
        url: "ajax/cad_tec.php",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
            if(response === "email_error"){
                $("#email-error").css("display","block");
            }else if(response === "senha_error"){
                $("#senha-error").css("display","block");
            }else if(response === "certo"){
                window.location.href ="menu.php?i=login&pag=login_tec";
            }
        }
    });
    
})

//Parte de login com AJAX

$("#logUser").on("submit",function(event){
    event.preventDefault();
    let data = $(this).serialize();
    $("#log-error").css("display","none");
    $.ajax({
        type: "post",
        url: "ajax/log_user.php",
        data: data,
        dataType: "json",
        success: function (response) {
            if(response === "error"){
                $("#log-error").css("display","block");
            }
            else if(response == "certo"){
                window.location.href = "index.php";
            }
        }
    });
    
    
})

$("#logTec").on("submit",function(event){
    event.preventDefault();
    var data = $(this).serialize();
    $("#log-error").css("display","none");
    $.ajax({
        type: "post",
        url: "ajax/log_tec.php",
        data: data,
        dataType: "json",
        success: function (response) {
            if(response === "error"){
                $("#log-error").css("display","block");
            }
            else if(response == "certo"){
                window.location.href = "index.php";
            }
        }
    });
    
})   

$("#cadServico").submit(function (e) { 
    e.preventDefault();
    var data = new FormData(this);
    $.ajax({
        type: "POST",
        url: "ajax/servico_cad.php",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
            if(response === "error"){
                $("#log-error").css("display","block");
            }
            else if(response == "certo"){
                window.location.href = "logado/userpainel.php";
            }
        }
    });
});


function setPage(id){
    window.location.href = "../cadservicos.php?type="+id;
    console.log(id)
}



//Parte de opacidade do header fixo
var lastScrollTop = 0;
if (document.querySelector(".fixheader")) {
    window.addEventListener('scroll', function (e) {
        if (e.scrollY === lastScrollTop) return;
        
        if($(".fixheader").offset().top > $(".fixheader").height()+45){
            if (this.scrollY < lastScrollTop) {
                $(".fixheader").css("opacity","1");
                $(".sub-menu-1").css("opacity","1");
            } else {
                $(".fixheader").css("opacity","0");
                $(".sub-menu-1").css("opacity","0");
            }
            lastScrollTop = this.scrollY;
        }
      }, true)
      
} 

if(document.querySelector(".sub-menu-1")){
    console.log($("#mail").offset().top+","+$(document).height());
    var mail = document.getElementById("mail");
    const menu1 = document.querySelector(".sub-menu-1");
    const menu2 = document.querySelector(".sub-menu-2");

    $(window).resize(function () { 
        let distancia = $(".fixheader").height()+$(".fixheader").offset().top
        $(".sub-menu-1").css("top",distancia+"px")
        let altura = ($("#mail").offset().left)
        $(".sub-menu-1").css("left",altura+"px")
    });
    $(window).scroll(function () { 
        if(menu1.classList.contains("sub-menu-active")){//|| menu2.classList.contains("sub-menu-active")){
            menu1.classList.remove("sub-menu-active");
        }
    });   
    $("#mail").click(function (e) {
        e.preventDefault();
        var distancia = $(".fixheader").height()+$(".fixheader").offset().top
        $(".sub-menu-1").css("top",distancia+"px")
        var altura = ($("#mail").offset().left)
        $(".sub-menu-1").css("left",altura+"px")
        $(".sub-menu-1").toggle("sub-menu-active");
    });
    $("#perfil").click(function (e) {
        e.preventDefault();
        var altura = $(".fixheader").height()
        $(".sub-menu-2").css("top",altura+"px")
        var distancia = (($("#perfil").offset().left)+$("#perfil").width()/2 )-($(".sub-menu-2").width()/2)
        $(".sub-menu-2").css("left",distancia+"px")
        $(".sub-menu-2").css("left",distancia+"px")
        $(".sub-menu-2").toggle("sub-menu-active");
    });

}
if(document.querySelector(".product")){

    function servSelecionado(n1, v1, n2, v2){
        const parametros = new URLSearchParams(window.location.search)
        parametros.set(n1,v1)
        parametros.append(n2,v2)
        console.log(parametros.get('s'))
        window.location.reload(true);
        window.location.href = "?"+parametros
    }
    // var product = document.querySelectorAll(".product");
    // product.forEach((e) => {
    //     e.addEventListener("onclick", function (){
            
    //     })
    // })
}
function adicionaParametro(n1, v1){
    const parametros = new URLSearchParams(window.location.search);

    if(parametros.has("order")){
        parametros.append("order", v1)
    }
    parametros.append(n1, v1)
    console.log(parametros.get("order"))
    window.location.href = "?"+parametros
}

function conversas(n){
    var msn = document.querySelector(".conversas")
    var voltar = document.querySelector(".voltar")
    msn.classList.toggle("ativo")
    voltar.classList.toggle("ativo")
}

function produto(){
    const urlParams = new URLSearchParams(window.location.search);
    const getParam = urlParams.get("servico");
    var listServico = document.querySelectorAll(".servicos");
    listServico.forEach(function (e, i){
        if(e.getAttribute("data-item") == getParam){
            console.log(e)
            e.classList.add("ativo");
        }
        console.log(e.getAttribute("data-item"))
    })
}
if(document.querySelector(".servicos")) produto();



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

const handleCpf = (event) => {
    let input = event.target
    input.value = cpf(input.value)
}

const cpf = (v) =>{
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}


function conversaWats(numero){
    window.location = "https://api.whatsapp.com/send?phone=55"+numero
}

function aceitarPedido(idServico){
    $.ajax({
        type: "post",
        url: "../ajax/aceitar_pedido.php?s="+idServico,
        data: 'data',
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                window.location.reload(true);
            } else {
                alert("Error ao registrar")
            }
        }
    });
}
function confirmarPedido(idServico){
    $.ajax({
        type: "post",
        url: "../ajax/confirmar_pedido.php?s="+idServico,
        data: 'data',
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                window.location.reload(true);
            } else {
                alert("Error ao registrar")
            }
        }
    });
}
function finalizarPedido(idServico){
    $.ajax({
        type: "post",
        url: "../ajax/finalizar_pedido.php?s="+idServico,
        data: 'data',
        dataType: "json",
        success: function (response) {
            var resposta = JSON.parse(response);
            if (resposta.finalizacao == 0) {
                alert("Erro ao finalizar servico")
            }else if(resposta.finalizacao == 1){
                alert("Aguardando finalizacao mutua")
            }else if(resposta.finalizacao == 2){
                alert("Servico finalizado com sucesso")
            }
            window.location.reload(true);
        }
    });
}
function cancelarPedido(idServico){
    $.ajax({
        type: "post",
        url: "../ajax/cancelar_pedido.php?s="+idServico,
        data: 'data',
        dataType: "json",
        success: function (response) {
            var resposta = JSON.parse(response);
            if (resposta.finalizacao == 0) {
                alert("Erro ao finalizar servico")
            }else if(resposta.finalizacao == 1){
                alert("Aguardando finalizacao mutua")
            }else if(resposta.finalizacao == 2){
                alert("Servico cancelado com sucesso")
            }
            window.location.reload(true);
        }
    });
}
function classificaTecnico(idTecnico, idServico){
    value = prompt("Avalie-o de 1 a 5", "4,5");
    if (value) {
        $.ajax({
            type: "post",
            url: "../ajax/classificar_tecnico.php?s="+idServico+"&value="+value+"&tec="+idTecnico,
            data: 'data',
            dataType: "json",
            success: function (response) {
                if (response == 1) {
                    alert("Sucesso")
                    window.location.reload(true);
                } else {
                    alert("Error ao classificar")
                }
            }
        });
    }else{
        console.log("Erro")
    }
    
}

function retornaEndereco(cep){
    var url = `https://viacep.com.br/ws/28300000/json/`
    $.ajax({
        type: "post",
        url: url,
        data: 'data',
        dataType: "json",
        success: function (response) {
            return response;
        }
    });
}

$(".filter-select").change(function (e) { 
    e.preventDefault();
    $("#filter").submit();
});

$("#button-pesquisa").click(function (e) { 
    e.preventDefault();
    $("#form-pesquisa").submit();
});
