// Obtener referencias a los elementos del DOM
const resultado = document.getElementById("resultado");
const mensajeError = document.getElementById("mensaje_error");
const nombreUsuario = document.getElementById("nombre-usuario");
const cedulaUsuario = document.getElementById("cedula-usuario");
//const emailUsuario = document.getElementById("email-usuario");
const idUsuario = document.getElementById("email-usuario");
const telefonoUsuario = document.getElementById("telefono-usuario");
const membresiaUsuario = document.getElementById("membresia-usuario");
const validezUsuario = document.getElementById("validez-usuario");
//const fotoUsuario = document.getElementById("foto-usuario");
const estado = document.getElementById("estado");
const textoEstado = document.getElementById("texto-estado");
const textoDelError = mensajeError ? mensajeError.querySelector('p') : null;

// Evita que aparezcan los divs al cargar la página
if (resultado) resultado.style.display = "none";
if (mensajeError) mensajeError.style.display = "none";

function buscarUsuario() {
    // Obtiene el valor del input y limpia espacios
    const inputBuscar = document.getElementById("buscar");
    const cedulaBuscada = inputBuscar.value.trim();

    // Si el input está vacío no hace nada 
    if (cedulaBuscada === "") {
        return;
    }
    

    // Preparar los datos para enviar via POST
    let formData = new FormData();
    formData.append('cedula', cedulaBuscada);

    // Realiza la petición al backend
    // Nota: 'panel/consultarpago' debe coincidir con Routes.php
    fetch('panel/consultarpago', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error('Error en la respuesta del servidor');
        return response.json();
    }) 
    .then(usuario => {
        // Si el controlador devuelve status error o no hay datos
        if (usuario.status === 'error' || !usuario) {
            if (textoDelError) {
                textoDelError.textContent = "La cédula ingresada no existe en el sistema. Por favor, verifica e intenta nuevamente.";
            }
            resultado.style.display = "none";
            mensajeError.style.display = "flex"; // Usamos flex para mantener diseño
            return;
        }

        // Si se encuentra el usuario, ocultamos error y mostramos resultado
        mensajeError.style.display = "none";
        resultado.style.display = "flex";

        // Asignamos los datos devueltos por el controlador a los elementos HTML
        nombreUsuario.textContent = usuario.nombre;
        cedulaUsuario.textContent = cedulaBuscada;
        idUsuario.textContent = "Socio #" + usuario.id;
        //emailUsuario.textContent = usuario.email || 'No registrado';
        telefonoUsuario.textContent = usuario.telefono || 'No registrado';
        membresiaUsuario.textContent = usuario.plan;
        validezUsuario.textContent = usuario.fecha;
        
        // Imagen por defecto si no tiene foto
        //fotoUsuario.src = usuario.foto ? `uploads/${usuario.foto}` : "https://via.placeholder.com/150";

        // Validar estado para aplicar clases CSS
        // Ajustado a los valores de tu ENUM de base de datos: 'Al día' o 'Pendiente'
        estado.classList.remove("activa", "expirada");

        if (usuario.estado === "Al día") {
            estado.classList.add("activa");
            textoEstado.textContent = "Al día";
            estado.style.backgroundColor = "#d4edda"; // Verde opcional
        } else {
            estado.classList.add("expirada");
            textoEstado.textContent = "Pendiente";
            estado.style.backgroundColor = "#f8d7da"; // Rojo opcional
        }
    })
    .catch((error) => {
        console.error("Error de conexión:", error);
        resultado.style.display = "none";
        if (textoDelError) {
            textoDelError.textContent = "Error de conexión. No se pudo contactar con el sistema.";
        }
        mensajeError.style.display = "flex";
    });
}

// Configurar el evento del teclado
const inputBuscar = document.getElementById('buscar');
if (inputBuscar) {
    inputBuscar.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            e.preventDefault();
            buscarUsuario();
        }
    });
}