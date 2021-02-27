'use strict'
// ! form ui validation for user

$(document).ready(function () {

    /* Regex */
    let rgTel2 = /^[0-9]{4}[0-9]{4}$/;
    let regexCedNac = /^[1-9]-?\d{4}-?\d{4}$/;
    let regexCedJur = /^[3]-?\d{3}-?\d{6}$/;
    let regexNombreApellido = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]{2,40}$/;
    let regexCorreo = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let regexNumTel = /^[0-9]{4}?[0-9]{4}$/;

    // Obtencion de inputs
    // const txtCedula = $('#txtCedulaContacto');
    const txtNombre = $('#txtNombreContacto');
    const txtApellido = $('#txtApellidoContacto');
    const txtCorreo = $('#txtCorreoContacto');
    const txtNumero = $('#txtNumeroContacto');
    const txtComentarios = $('#txtComentariosContacto');


    // ! Funciones iconos de validacion
    const iconoInputCorrecto = (txtInput) => {
        console.log(`correcto`);

        txtInput.siblings('.icon-valid-input').removeClass('d-none'); //icon check mark
        txtInput.siblings('.icon-error-input').addClass('d-none'); //icon cross mark

        txtInput.removeClass('input-border-error'); //red border
        txtInput.addClass('input-border-valid'); //green border

    }

    const iconoInputIncorrecto = (txtInput) => {

        txtInput.siblings('.icon-valid-input').addClass('d-none');
        txtInput.siblings('.icon-error-input').removeClass('d-none');

        txtInput.removeClass('input-border-valid'); //green border
        txtInput.addClass('input-border-error'); //red border

    }


    //! Funciones de Validacion
    //cedula nacional •
    const validaCedulaContactoNac = (cedula) => {

        if (!(regexCedNac.test(cedula.trim()))) {

            //*not valid 
            iconoInputIncorrecto(txtCedula);
        } else {

            //*valid
            iconoInputCorrecto(txtCedula);
        }

    }
    //cedula juridica •
    const validaCedulaContactoJur = (cedula) => {

        if (!(regexCedJur.test(cedula.trim()))) {

            //*not valid 
            txtCedula.removeClass('input-valid');
            txtCedula.addClass('input-error');

        } else {

            //*valid
            txtCedula.removeClass('input-error');
            txtCedula.addClass('input-valid');

        }

    }

    //nombre •
    const validaNombreContacto = (nombre) => {

        if (!regexNombreApellido.test(nombre.trim())) {

            iconoInputIncorrecto(txtNombre);

        } else {
            iconoInputCorrecto(txtNombre);

        }
    }

    //Apellido
    const validaApellidoContacto = (apellido) => {

        if (!regexNombreApellido.test(apellido.trim())) {
            iconoInputIncorrecto(txtApellido);

        } else {
            iconoInputCorrecto(txtApellido);

        }
    }

    //correo
    const validaCorreoContacto = (correo) => {
        if (!regexCorreo.test(correo)) {
            iconoInputIncorrecto(txtCorreo);

        } else {
            iconoInputCorrecto(txtCorreo);

        }
    }

    const validaNumeroContacto = (numero) => {
        let numeroTest = parseInt(numero);

        if (!regexNumTel.test(numero)) {
            iconoInputIncorrecto(txtNumero);

        } else {
            iconoInputCorrecto(txtNumero);

        }
    }

    // !Eventos
    //! Validación JQ Eventos

    txtNombre.keyup(function () {
        let nombre = $(this).val();
        validaNombreContacto(nombre);
    });

    txtApellido.keyup(function () {
        let apellido = $(this).val();
        validaApellidoContacto(apellido);
    });

    txtCorreo.keyup(function () {
        let correo = $(this).val();
        validaCorreoContacto(correo);
    });

    txtNumero.keyup(function () {
        let numero = $(this).val();
        validaNumeroContacto(numero);
    });

    txtComentarios.keyup(function () {
        let comentarios = $(this).val();
        // ** implementar if needed
        // validaComentariosContacto(comentarios);
    });


}); 
