//Obtener datos
const resultado = document.getElementById("resultado");
const mensajeError = document.getElementById("mensaje_error");
const nombreUsuario = document.getElementById("nombre-usuario");
const idUsuario = document.getElementById("id-usuario");
const emailUsuario = document.getElementById("email-usuario");
const telefonoUsuario = document.getElementById("telefono-usuario");
const membresiaUsuario = document.getElementById("membresia-usuario");
const validezUsuario = document.getElementById("validez-usuario");
const fotoUsuario = document.getElementById("foto-usuario");
const estado = document.getElementById("estado");
const textoEstado = document.getElementById("texto-estado");
const textoDelError = mensajeError ? mensajeError.querySelector('p') : null;


//Evita que aparezan los divs al cargar la página
resultado.style.display = "none";
mensajeError.style.display = "none";

function buscarUsuario() {
    // Obtiene el valor del input 
    const idBuscado = document.getElementById("buscar").value.trim();

    // Si el input está vacío no hace nada 
    if (idBuscado === ""){
        return;
    }

    // Realiza una petición al backend con el fecth
    let url = `${BASE_URL}/consultar-membresia/${idBuscado}`;
    fetch(url)

        //Respuesta del servidor en formato json
        .then(response => response.json()) 
    

        //Recibe el objeto devuelto por el backend
        .then(usuario => {

            //Si el usuario no se encuentra muestra un error
            if (!usuario || usuario.error) {

                if(textoDelError){
                    textoDelError.textContent = "El ID ingresado no existe en el sistema. Por favor, verifica e intenta nuevamente."
                }
                resultado.style.display = "none";
                mensajeError.style.display = "block";
                return;

            // Si se encuentra el usuario    
            }else{
                mensajeError.style.display = "none";
                resultado.style.display = "flex";
            }

            //Se asignan los datos del usuario a los elementos html
            nombreUsuario.textContent = usuario.nombre;
            idUsuario.textContent = usuario.id;
            emailUsuario.textContent = usuario.email;
            telefonoUsuario.textContent = usuario.telefono;
            membresiaUsuario.textContent = usuario.membresia;
            validezUsuario.textContent = usuario.validez;
            fotoUsuario.src = usuario.foto ?? "imagenes/default.jpeg";

            // Validar estado
            estado.classList.remove("activa", "expirada");

            if (usuario.estado === "activa") {
                estado.classList.add("activa");
                textoEstado.textContent = "Activa";
            } else {
                estado.classList.add("expirada");
                textoEstado.textContent = "Expirada";
            }
        })

        // Error de conexión con la base de datos
        .catch((error) => {

                //Muestra el error en la consola
                console.log("Error de conexión:", error);
                resultado.style.display = "none";

                //Cambia el texto del error
                if(textoDelError){
                    textoDelError.textContent = "Error de conexión. No se pudo contactar con el sistema. Intente más tarde.";
                }
                mensajeError.style.display = "block";
            }
        );
}

//Se obtiene el id
const inputBuscar = document.getElementById('buscar');

    //Evento de pulsación de tecla
    inputBuscar.addEventListener("keypress", (e) => {
        //Si se oprime enter
        if(e.key === "Enter"){

            //Evita que la págin se recargue
            e.preventDefault();

            //Llama a la función
            buscarUsuario();
        }
    });


    
    

   