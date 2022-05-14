$(document).ready(function () {

    $('#btnSend').click(function () {

        var errores = '';

        // Validado Nombre ==============================
        if ($('#names').val() == '') {
            errores += '<p><i class="fas fa-user-alt"></i>Escriba un nombre</p>';
            $('#names').css("border-bottom-color", "#F14B4B")
        } else {
            $('#names').css("border-bottom-color", "#d1d1d1")
        }

        // Validado tel ==============================
        if ($('#telefono').val() == '') {
            errores += '<p><i class="fas fa-phone"></i>Escriba su telefono</p>';
            $('#telefono').css("border-bottom-color", "#F14B4B")
        } else {
            $('#telefono').css("border-bottom-color", "#d1d1d1")
        }

        // Validado Email ==============================
        if ($('#correo').val() == '') {
            errores += '<p><i class="fas fa-at"></i>Escriba su email</p>';
            $('#correo').css("border-bottom-color", "#F14B4B")
        } else {
            $('#correo').css("border-bottom-color", "#d1d1d1")
        }


        // Validado select ==============================
        if ($('#pais').val() == '') {
            errores += '<p><i class="fas fa-at"></i>Seleccione su pais</p>';
            $('#pais').css("border-bottom-color", "#F14B4B")
        } else {
            $('#pais').css("border-bottom-color", "#d1d1d1")
        }

        // Validado select ==============================
        if ($('#mensaje').val() == '') {
            errores += '<p><i class="fa-solid fa-message"></i>Escriba su mensaje</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else {
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }
        

        // ENVIANDO MENSAJE ============================
        if (errores == '' == false) {
            var mensajeModal = '<div class="modal_wrap">' +
                '<div class="mensaje_modal">' +
                '<h3>Errores encontrados</h3>' +
                errores +
                '<span id="btnClose">Cerrar</span>' +
                '</div>' +
                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function () {
            $('.modal_wrap').remove();
        });
    });

});