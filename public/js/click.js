//Contador
let counter = 0;
function contadorClick(){
    counter++;
    //Verifica los clics
    if(counter == 5){
        //Redirige a la página
        window.location.href = "login";
        counter = 0;
    }
}