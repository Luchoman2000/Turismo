const formularios_ajax = document.querySelectorAll(".FormularioAjax");

/*----------  Funcion enviar formularios ajax - Send ajax forms function ----------*/
function enviar_formulario_ajax(e) {
    e.preventDefault();

    let data = new FormData(this);
    let method = this.getAttribute("method");
    let action = this.getAttribute("action");
    let tipo = this.getAttribute("data-form");

    let encabezados = new Headers();

    let config = {
        method: method,
        headers: encabezados,
        mode: 'cors',
        cache: 'no-cache',
        body: data
    };

    let texto_alerta;

    if (tipo === "save") {

        texto_alerta = "Los datos serán guardados en el sistema";


    } else if (tipo === "delete") {

        texto_alerta = "Los datos serán eliminados completamente del sistema";


    } else if (tipo === "update") {

        texto_alerta = "Los datos serán actualizados en el sistema";


    } else if (tipo === "search") {

        texto_alerta = "Se eliminará el término de búsqueda y tendrás que escribir uno nuevamente";


    } else {

        texto_alerta = "Quieres realizar la operación solicitada";


    }

    let titulo_alerta;
    let btn_confirm_alerta;
    let btn_cancel_alerta;


    titulo_alerta = "¿Estás seguro?";
    btn_confirm_alerta = "Aceptar";
    btn_cancel_alerta = "Cancelar";



    Swal.fire({
        title: titulo_alerta,
        text: texto_alerta,
        icon: 'question',
        showCancelButton: true,
        showDenyButton: false,
        showConfirmButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: btn_confirm_alerta,
        cancelButtonText: btn_cancel_alerta
    }).then((result) => {
        if (result.isConfirmed) {

            fetch(action, config)
                .then(respuesta => {
                    return respuesta.json()
                })
                .then(respuesta => {
                    return alertas_ajax(respuesta)
                })
                // .then(respuesta => {
                //     console.log(respuesta)
                //     return alertas_ajax(respuesta);
                // });

        }
    });



}


/*----------  Funcion listar formularios - List forms function ----------*/
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
});


/*----------  Funcion mostrar alertas - Show alerts function ----------*/
function alertas_ajax(alerta) {
    console.log(alerta)
    if (alerta.Alerta === "simple") {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Icon,
            confirmButtonText: alerta.TxtBtn
        });
    } else if (alerta.Alerta === "recargar") {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Icon,
            confirmButtonText: alerta.TxtBtn
        }).then((result) => {
            if (result.value) {
                location.reload();
            }
        });
    } else if (alerta.Alerta === "limpiar") {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Icon,
            confirmButtonText: alerta.TxtBtn
        }).then((result) => {
            if (result.value) {
                document.querySelector(".FormularioAjax").reset();
            }
        });
    } else if (alerta.Alerta === "venta") {
        Swal.fire({
            title: alerta.Titulo,
            text: alerta.Texto,
            icon: alerta.Icon,
            confirmButtonText: alerta.TxtBtn
        }).then((result) => {
            if (result.value) {
                document.querySelector('#sale-barcode-input').value = "";
            }
        });
    } else if (alerta.Alerta === "redireccionar") {
        window.location.href = alerta.URL;
    }
}