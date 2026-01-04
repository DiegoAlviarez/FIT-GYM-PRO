
function inicioSesion(){
    let usuario = document.getElementById('usuario').value;
    let contraseña = document.getElementById('contraseña').value;

    if( usuario == "admin" && contraseña == "admin"){
        window.location="gestion.html"
    }
    else{
        alert("Datos incorrectos")
    }
}

