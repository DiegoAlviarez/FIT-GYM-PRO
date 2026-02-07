
const tarjetas = document.querySelectorAll('.tarjeta-instructores');
const descripcion = document.getElementById('descripcionInstructores');

tarjetas.forEach(tarjeta => {
    tarjeta.addEventListener('click', () => {
        descripcion.textContent = tarjeta.dataset.descripcion;
    });
});



