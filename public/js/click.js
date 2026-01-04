let counter = 0;
function contadorClick(){
    counter++;
    if(counter == 5){
        window.location.href = "login";
        counter = 0;
    }
}