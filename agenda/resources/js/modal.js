$(function() {
    var modal = document.getElementById('myModal');
    var span = document.getElementById("span");
    var btnCancelar = document.getElementById("btnCancelar");
    var hideHora = document.getElementById("hora_inicio");
    hideHora.style.visibility = "hidden";


    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    span.onclick = function() {
        $('#myModal').modal('hide');
    }

    btnCancelar.onclick = function() {
        $('#myModal').modal('hide');
    }

    setInterval(function() {
        if(document.getElementById('dia_todo').checked) {
            hideHora.style.visibility = "hidden";
        }else {
            hideHora.style.visibility = "visible";
        }
    }, 10);
    

});