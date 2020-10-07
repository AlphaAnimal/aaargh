// Llamamos a esta función en window.onload
let contador_palabras = 0;
let palabra_activa = "";
let nueva_palabra = true;
let correctas = 0;
let tiempo_restante = 59;
let fin = false;

function inicializarPalabras(palabras) {
    // Recogemos el string de palabras que mandamos desde PHP, y quitamos el espacio en blanco que hay al principio
    let palabras_string = palabras.trim();
    let palabras_array = palabras_string.split(" ");
    mostrarPalabras(palabras_array);
}

function comenzar(){
    let input = document.getElementById("input");
    input.removeAttribute("readonly");
    input.setSelectionRange(0, 0);
    let start_button = document.getElementById("start-button");
    start_button.removeEventListener("click", comenzar, false);
    // Añadimos el event listener para saber cuando el usuario escribe
    document.getElementById("input").addEventListener("keydown", manejarTeclado, false);

    input.focus();

}

// Mostramos las palabras, cada una en un <span> individual con id propio, y con clase común
function mostrarPalabras(palabras_array) {
    for (let i=0; i<=palabras_array.length; i++){
        let span_palabra = document.createElement("span");
        span_palabra.setAttribute("class", "palabras");
        span_palabra.setAttribute("id", "p"+i);
        span_palabra.innerHTML = palabras_array[i];
        let div_palabras = document.getElementById("palabras");
        div_palabras.appendChild(span_palabra);
    }
}

function contador(){
    let input = document.getElementById("input");
    input.removeEventListener("keydown", contador, false);
    let reloj = document.getElementById("info");
    let cuenta_atras = setInterval(function(){
        if(tiempo_restante <= 0){
            clearInterval(cuenta_atras);
            fin = true;
            reloj.innerHTML = "Puntuación: "+correctas+ " palabras por minuto";
            input.setAttribute("readonly", "true");

        } else {
            reloj.innerHTML = tiempo_restante + " segundos restantes";
        }
        tiempo_restante -= 1;
    }, 1000);
}

function manejarTeclado(){
    let input = document.getElementById("input");
    input.removeEventListener("keydown", manejarTeclado);
    let error = false;
    input.addEventListener("keydown", contador, false);

    input.addEventListener("keyup", ev => {

        if (fin === false){
            // Resta un caracter a la palabra activa
            let span_palabra = document.getElementById("p"+contador_palabras);
            let valor = span_palabra.innerHTML;

            // Guardamos la palabra nueva completa
            if (nueva_palabra == true){
                palabra_activa = valor;
                nueva_palabra = false;
            }

            // Calculamos cuantas letras nos quedan.
            let letras_restantes = valor.length;

            // Restamos caracteres a la palabra actual,
            if (ev.keyCode !== 8){
                span_palabra.innerHTML = valor.substr(1);
                // Comprobamos si la letra actual es correcta
                let letra_actual = valor.substr(0, 1);
                if (ev.key !== letra_actual && ev.keyCode !== 32){
                    error = true;
                }
            }
            // o añadimos en caso de que el usuario quiera borrar
            else {
                span_palabra.innerHTML = palabra_activa.substr(palabra_activa.length - (letras_restantes + 1));
            }

            // Condición de que la tecla sea un espacio, en cuyo caso eliminamos el <span> activo
            if (ev.keyCode === 32){
                // Además comprobamos si se ha escrito correctamente la anterior
                if (error === false && letras_restantes === 0){
                    correctas++;
                }
                let div_palabras = document.getElementById("palabras");
                div_palabras.removeChild(span_palabra);
                contador_palabras++;
                nueva_palabra = true;
                error = false;
            }
        }
    })

}



