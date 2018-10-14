document.getElementById("btn0").addEventListener("click", att0);
document.getElementById("btn1").addEventListener("click", att1);
document.getElementById("btn2").addEventListener("click", att2);

function att0(){
    var today = new Date();
    var y = today.getFullYear() + 1;
    var m = today.getMonth() + 1;
    var d = today.getDate();
    document.getElementById("date0").innerHTML = d+"-"+m+"-"+y;
    document.getElementById("lbl0").innerHTML = '<span class="label label-success">Em funcionamento</span>';
}
function att1(){
    var today = new Date();
    var y = today.getFullYear() + 1;
    var m = today.getMonth() + 1;
    var d = today.getDate();
    document.getElementById("date1").innerHTML = d+"-"+m+"-"+y;
    document.getElementById("lbl1").innerHTML = '<span class="label label-success">Em funcionamento</span>';
}
function att2(){
    var today = new Date();
    var y = today.getFullYear() + 1;
    var m = today.getMonth() + 1;
    var d = today.getDate();
    document.getElementById("date2").innerHTML = d+"-"+m+"-"+y;
    document.getElementById("lbl2").innerHTML = '<span class="label label-success">Em funcionamento</span>';
}
