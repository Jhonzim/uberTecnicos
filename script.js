

//Funções de troca de tema
function getCookie(k) {
    var cookies = " " + document.cookie;
    var key = " " + k + "=";
    var start = cookies.indexOf(key);

    if (start === -1) return null;

    var pos = start + key.length;
    var last = cookies.indexOf(";", pos);

    if (last !== -1) return cookies.substring(pos, last);

    return cookies.substring(pos);
}
function setCookie(cname, cvalue, exdays) { 
    var d = new Date(); 
    d.setTime(d.getTime() + (exdays*24*60*60*1000)); var expires = 'expires='+ d.toUTCString(); 
    document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/'; 
}
function changeThemeToDark(){
    document.documentElement.setAttribute('data-theme','dark');}
function changeThemeToLight(){
    document.documentElement.setAttribute('data-theme','light');}

let icon = document.getElementById("icon")

if(getCookie("tema") === "dark"){
    document.documentElement.setAttribute("data-theme", getCookie("tema"))
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon-o");
}
icon.onclick = () =>{
    if(document.documentElement.getAttribute('data-theme') == "light"){
        icon.classList.remove("fa-sun");
        icon.classList.add("fa-moon-o");
        changeThemeToDark();
        setCookie("tema","dark",3)
    }else{
        changeThemeToLight();
        icon.classList.remove("fa-moon-o");
        icon.classList.add("fa-sun");
        setCookie("tema","light",3)
    }
}

//função de fazer o rotate do form

var card = document.getElementById("card");

function IrTecnico(){
    card.style.transform = "rotateY(-180deg)";
}
function IrUsuario(){
    card.style.transform = "rotateY(0deg)";
}

//codigo para mudar o link selecionado no menu

function ativadorLinks(param, classe){
    const urlParams = new URLSearchParams(window.location.search);
    const getParam = urlParams.get(param);
    const myHref = "?"+param+"="+getParam 

    for (let i = 0; i < $(classe).length; i++) {
        const ele = $(classe)[i];
        const href = ele.getAttribute("href")
        if(href === myHref){
            ele.classList.remove("desativo-link")
            ele.classList.add("ativo-link")
        }else{
            ele.classList.remove("ativo-link")
            ele.classList.add("desativo-link")
        }
    };
}
ativadorLinks("i", ".links-menu")

