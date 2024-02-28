function iniciarPagina(event) {
    $('#registrarMateria').click(function (evt) {
        evt.preventDefault();
        console.log("Bienvenidos");
        validarCurso();
    });
}

function validarCurso() {
    let materia = document.getElementById('materia');
    let docente = document.getElementById('docente');
    let idCurso = document.getElementById('grado');

    let err = 0;

    if (idCurso.value === "" || idCurso.value === null) {
        err++;
        alert("El campo idCurso no puede esta vacio");
        idCurso.focus();
    }

    if (materia.value === "" || materia.value === null) {
        err++;
        alert("El campo materia no puede estar vacio");
        materia.focus();
    }

    if (docente.value === "" || docente.value === null) {
        err++;
        alert("El campo docente no puede ir vacio");
        docente.focus();
    }

    if (err < 1) {
        console.log("VAMOS A REGISTRAR EL USUARIO");
        registrarMateria();
    }
    else {
        console.log("FALTA DILIGENCIAR LA INFORMACIÓN");
    }
}

function registrarMateria() {
    let materia = $('#materia').val();
    let docente = $('#docente').val();
    let grado = $('#grado').val();

    let cadena = 'grado=' + grado + '&docente=' + docente + '&materia=' + materia;

    $.ajax({
        type: 'POST', // Protocolos HTTP -> Enviar información
        url: '../Modelo/accionMateria.php?accion=registrarMateria',
        data: cadena,
        async: true,
        success: function (r) { // r -> Respuesta del servidor
            if (r == 0) {
                alert("No se pudo registrar la información.");
            } else if (r == 1) {
                alert("La información se registró correctamente.");
            } else {
                alert("Error desconocido." + r);
            }
        },
        error: function (e) {
            alert("Error con el servidor: " + e);
        }
    });

}
