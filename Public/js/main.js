
function alterViewPass() {
    $('#passUser').attr('type', 'text')
    $('#eyesFas').attr('class', 'fas fa-eye')
}

function alterClosePass() {
    $('#passUser').attr('type', 'password')
    $('#eyesFas').attr('class', 'fas fa-eye-slash')
}

//Efeito do scroll da ancora
jQuery(document).ready(function($) {
    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 700);
    });
});

// Exibir janela modal
$(document).ready(function() {
    $('#modal-mensagem').modal('show');
})

//Formata o input celular
function formata(src, mask) {
    var i = src.value.length;
    var saida = mask.substring(0, 1);
    var texto = mask.substring(i)
    if (texto.substring(0, 1) != saida) {
        src.value += texto.substring(0, 1);
    }
}

//Ver opções
function showOption(idDiv) {
    var id = document.getElementById(idDiv);
    if (id.className == 'd-none') {
        id.className = 'd-block w-100 border-bottom bg-white';
    } else {
        id.className = 'd-none';
    }
}

function showDiv(mostraId, someId) {
    document.getElementById(someId).className = 'd-none'
    document.getElementById(mostraId).className = 'd-block my-5'
}