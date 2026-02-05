//Obtienen los datos
const btnReg = document.getElementById('registrar');
const btnGstn = document.getElementById('gestionar');
const vstaReg = document.getElementById('content-reg');
const vstaGstn = document.getElementById('content-gstn');

if(btnReg && btnGstn){
    //Activar la vista de registro
    btnReg.addEventListener('click', function(){
        btnReg.classList.add('activo2');
        btnGstn.classList.remove('activo2');
        vstaReg.style.display = 'block';
        vstaGstn.style.display = 'none';
    });
    //Activar la vista de gestión
    btnGstn.addEventListener('click', function(){
        btnReg.classList.remove('activo2');
        btnGstn.classList.add('activo2');
        vstaReg.style.display = 'none';
        vstaGstn.style.display = 'block';
    });
}

//Datos de los planes
const seleccion = document.getElementById('id_plan');
const caja1 = document.getElementById('bnf2');
const caja2 = document.getElementById('bnf3');
const caja3 = document.getElementById('bnf4');

function actualizarBeneficiarios(){

    if(!seleccion) return;
    let opcion = seleccion.value;

    //Oculta los cambios inicialmente
    caja1.style.display = 'none';
    caja2.style.display = 'none';
    caja3.style.display = 'none';

    //Aparece el espacio para agregar a 1 persona
    if(opcion === '1'){
        caja1.style.display = 'block';
    }
    //Aparece el espacio para agregar a 3 personas
    if( opcion === '6'){
        caja1.style.display = 'block';
        caja2.style.display = 'block';
        caja3.style.display = 'block';
    }
}
//Cambios manuales
if(seleccion){
    seleccion.addEventListener('change', actualizarBeneficiarios);
}
//Asegura que la vista se ajuste
document.addEventListener('DOMContentLoaded', actualizarBeneficiarios);


