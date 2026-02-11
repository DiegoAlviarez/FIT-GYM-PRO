function destino() {
    // Captura la URL de la opción seleccionada
    var url = document.navegador.secciones.options[document.navegador.secciones.selectedIndex].value;

    // Si la opción no es un separador o el título, redirige
    if (url != "no") {
        window.location = url;
    }
}