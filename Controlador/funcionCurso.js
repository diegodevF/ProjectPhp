function iniciarPagina(event){
    $('#registrarCurso').click(function(evt){
        evt.preventDefault();
        console.log("Bienvenidos");
        validarCurso();
    });
}

function validarCurso(){
    let idCurso = document.getElementById('idCurso');
    let grado = document.getElementById('Grado');

    let err = 0;

    if(idCurso.value === "" || idCurso.value === null){
        err++;
        alert("El campo no puede esta vacio");
        idCurso.focus();
    }

    if(grado.value === "" || grado.value === null){
        err++;
        alert("El campo Grado no puede ir vacio");
        grado.focus();
    }

    if (err < 1) {
        console.log("VAMOS A REGISTRAR EL USUARIO");
        registrarUsuario();
    }
    else {
        console.log("FALTA DILIGENCIAR LA INFORMACIÓN");
    }
}

function registrarUsuario() {
    let id_curso = $('#idCurso').val();
    let grado = $('#Grado').val();

    let cadena = 'idCurso=' + id_curso + '&Grado=' + grado;

    $.ajax({
        type: 'POST', // Protocolos HTTP -> Enviar información
        url: '../Modelo/accionCurso.php?accion=registrar',
        data: cadena,
        async: true,
        success: function (r) { // r -> Respuesta del servidor
            if(r == 0) {
                alert("No se pudo registrar la información.");
            } else if(r == 1) {
                alert("La información se registró correctamente.");
            } else {
                alert("Error desconocido."+ r);
            }
        },
        error: function (e) {
            alert("Error con el servidor: " + e);
        }
    });

}
