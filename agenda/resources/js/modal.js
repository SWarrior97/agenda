$(function() {
    var modal = document.getElementById('myModal');
    var btnCancelar = document.getElementById("btnCancelar");
    var hideHora = document.getElementById("hora_inicio");
    hideHora.style.visibility = "hidden";


    window.onclick = function(event) {
        if (event.target == modal) {
            window.location.href = '/home';
        }
    }


    btnCancelar.onclick = function() {
        window.location.href = '/home';
    }

    setInterval(function() {
        if(document.getElementById('dia_todo').checked) {
            hideHora.style.visibility = "hidden";
        }else {
            hideHora.style.visibility = "visible";
        }
    }, 10);
    

});