document.getElementById("btnCaminho").addEventListener("click", ativar);
tempInicial();
tempAtual();

function ativar(){
    document.getElementById("caixa").classList.add("alert-warning");
    document.getElementById("caixa").classList.remove("alert-danger");
    document.getElementById("btnCaminho").classList.add("btn-secondary");
    document.getElementById("btnCaminho").classList.add("disabled");
    document.getElementById("btnCaminho").classList.remove("btn-warning");
    document.getElementById("btnCaminho").removeEventListener("click", ativar);
    document.getElementById("btnConclusao").classList.remove("disabled");
    document.getElementById("btnConclusao").addEventListener("click", concluir);
   
}

function concluir(){
    document.getElementById("caixa").classList.add("alert-success");
    document.getElementById("caixa").classList.remove("alert-warning");
    document.getElementById("btnConclusao").classList.add("btn-secondary");
    document.getElementById("btnConclusao").classList.add("disabled");
    document.getElementById("btnConclusao").classList.remove("btn-success");
    document.getElementById("btnConclusao").removeEventListener("click", ativar);
    clearTimeout(t);
    tempFinal();
    
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function tempInicial() {
    var today = new Date();
    var h = checkTime(today.getHours());
    var m = checkTime(today.getMinutes());
    var s = checkTime(today.getSeconds());
  //  document.getElementById("tempoInicio").innerHTML = "Recebido " + h + ":" + m + ":" + s;
}

function tempAtual() {
    var today = new Date();
    var h = checkTime(today.getHours());
    var m = checkTime(today.getMinutes());
    var s = checkTime(today.getSeconds());
    document.getElementsByClassName("tempoAtual").innerHTML = "Decorrido " + h + ":" + m + ":" + s;
    t = setTimeout(tempAtual, 500);
}

function tempFinal() {
    var today = new Date();
    var h = checkTime(today.getHours());
    var m = checkTime(today.getMinutes());
    var s = checkTime(today.getSeconds());
    document.getElementsByClassName("tempoAtual").innerHTML = "Terminado " + h + ":" + m + ":" + s;
    document.getElementById("horarioresp").value= h + ":" + m + ":" + s;
}