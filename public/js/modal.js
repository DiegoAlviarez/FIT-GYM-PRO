
const tarjetas = document.querySelectorAll('.tarjeta-instructores1');
const parrafoModal = document.getElementById('descripcionInstructores');

tarjetas.forEach(tarjeta => {
    tarjeta.addEventListener('click', function() {
        const info = this.getAttribute('data-descripcion');

        console.log("Dato capturado:", info);
        if (info && info.trim() !== ""){
            parrafoModal.innerText = info;
        } else{
            parrafoModal.innerText = "Información biográfica en actualización";
        }
    });
});



