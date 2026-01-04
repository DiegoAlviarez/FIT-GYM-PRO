const btnReg = document.getElementById('registrar');
const btnGstn = document.getElementById('gestionar');
const vstaReg = document.getElementById('content-reg');
const vstaGstn = document.getElementById('content-gstn');

if(btnReg && btnGstn){
    btnReg.addEventListener('click', function(){
        btnReg.classList.add('activo2');
        btnGstn.classList.remove('activo2');
        vstaReg.style.display = 'block';
        vstaGstn.style.display = 'none';
    });

    btnGstn.addEventListener('click', function(){
        btnReg.classList.remove('activo2');
        btnGstn.classList.add('activo2');
        vstaReg.style.display = 'none';
        vstaGstn.style.display = 'block';
    });
}



const seleccion = document.getElementById('tipo_membresia');
const caja1 = document.getElementById('bnf2');
const caja2 = document.getElementById('bnf3');
const caja3 = document.getElementById('bnf4');

function actualizarBeneficiarios(){

    if(!seleccion) return;
    let opcion = seleccion.value;

    caja1.style.display = 'none';
    caja2.style.display = 'none';
    caja3.style.display = 'none';

    if(opcion === '2x1'){
        caja1.style.display = 'block';
    }
    if( opcion === 'familiar'){
        caja1.style.display = 'block';
        caja2.style.display = 'block';
        caja3.style.display = 'block';
    }
}
if(seleccion){
    seleccion.addEventListener('change', actualizarBeneficiarios);
}
document.addEventListener('DOMContentLoaded', actualizarBeneficiarios);


