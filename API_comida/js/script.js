let ingredientes = [];

window.onload = function() {
    document.getElementById("añadir").addEventListener("click", lista, false);
    document.getElementById("buscar").addEventListener("click", buscar, false);
}

function lista() {
    let nuevo = document.getElementById("nuevo").value;

    // Comprobamos que no contenga valores numéricos o caracteres especiales
    let regex = /^[A-Za-z]{2,20}$/;
    if (regex.test(nuevo) === true){

        // Comprobamos que no exista ya en la lista
        if (ingredientes.includes(nuevo) === true){
            alert("Duplicate ingredient");
        }
        else {

            // Añadimos el nuevo ingrediente al array
            if (Array.isArray(ingredientes) && ingredientes.length){
                let nextIngredient = "+"+nuevo;
                ingredientes.push(nextIngredient);
            }
            else {
                ingredientes.push(nuevo)
            }

            // Mostramos el nuevo ingrediente en la lista
            let node = document.createElement("li");
            let text = document.createTextNode(nuevo);
            node.appendChild(text);
            document.getElementById("lista").appendChild(node);
        }

        // Limpiamos el input
        document.getElementById("nuevo").value = "";
    }
    else {
        alert("Not a valid ingredient");
    }
}

function buscar() {

    let query = ingredientes.toString();

    // Llamamos a la api usando los ingredientes como parametros
    fetch("https://api.spoonacular.com/recipes/search?apiKey=322ee94dbd8a4e1fb7acb03d666f7cdc&query="+query+"&number=100", {
        "method": "GET",
        "headers": {
            'Content-Type': 'application/json',
        }
    })
        .then(response => {
            response.json()
                .then( data => {

                    // Solo nos interesa el id de cada receta, con el cual haremos una siguiente llamada a la api
                    for (let i = 0; i < data.results.length; i++) {
                        link(data.results[i].id);
                    }
                });
        })
        .catch(err => {
            console.log(err);
        });

    reset();
}


function link(id) {
    fetch("https://api.spoonacular.com/recipes/"+id+"/information?apiKey=322ee94dbd8a4e1fb7acb03d666f7cdc", {
        "method": "GET",
        "headers": {
            'Content-Type': 'application/json',
        }
    })
        .then(response => {
            response.json()
                .then(data => {

                    // Añadimos cada receta a la lista. Cada nombre de receta tendrá un link a su web de origen
                    let li = document.createElement("li");
                    let a = document.createElement("a");
                    let text = document.createTextNode(data.title);
                    a.appendChild(text);
                    a.href = data.sourceUrl;
                    a.target = "_blank";
                    li.appendChild(a);

                    // También nos interesa devolver el tiempo estimado que se tarda en cocinar
                    let time = document.createElement("li");
                    let t = document.createTextNode("Ready in " + data.readyInMinutes + " minutes");
                    time.appendChild(t);

                    document.getElementById("recipes").appendChild(li);
                    document.getElementById("recipes").appendChild(time);
                })
        })

}

function reset() {

    // Cambiamos el botón de Buscar por uno de Resetear
    let button = document.getElementById("buscar");
    button.addEventListener("click", reload, false);
    button.innerText = "Reiniciar";

}

function reload() {
    location.reload();
}



