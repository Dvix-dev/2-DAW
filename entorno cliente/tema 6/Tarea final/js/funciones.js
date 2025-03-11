// Definicion de clases
class Disco {
    // Constructor
    constructor(nombre, grupo, año, tipo, localizacion) {
        this.nombre = nombre;
        this.grupo = grupo;
        this.año = año;
        this.tipo = tipo;
        this.localizacion = localizacion;
        this.prestado = false;
    }

    // Metodos
    cambiarLocalizacion(nuevaLocalizacion) {
        this.localizacion = nuevaLocalizacion;
    }

    cambiarPrestado() {
        this.prestado = !this.prestado;
    }

    mostrarInformacion() {
        let prestado = this.prestado ? "Si" : "No";
        return `<b>Canción:</b> ${this.nombre} - ${this.grupo} <br><b>Año:</b> ${this.año} - <b>Tipo:</b> ${this.tipo} - <b>Estanteria:</b> ${this.localizacion} - <b>Prestado:</b> ${prestado}`;
    }
}

// Definicion de variables globales
let discos = [
    new Disco("Gran Via", "Quevedo, Aitana", 2025, "pop", 2),
    new Disco("Animal in Me", "Solence", 2020, "rock", 2),
    new Disco("Waiting For Love", "Avicii", 2015, "pop", 1),
    new Disco("Why Worry", "Set It Off", 2014, "punk", 3)
];

let display = document.querySelector('#display');
let titulo = document.createElement("h2");

// Funciones
function agregarDisco(disco, inicio) {
    const addModal = document.querySelector("#displayAddModal");
    let lista = discos;
    if (inicio) {
        discos.unshift(disco);
    } else {
        discos.push(disco);
    }
    actualizarLista(lista, "Disco añadido " + (inicio ? "al inicio" : "al final"));
    addModal.style.display = "none";
}

function borrarDisco(inicio) {
    if (discos.length > 0) {
        inicio ? discos.shift() : discos.pop();
        actualizarLista(discos, "Disco eliminado " + (inicio ? "del inicio" : "del final"));
    }
}

function numeroDiscos() {
    display.innerHTML = "";
    let info = document.createElement("p");
    titulo.innerText = "Número de discos";
    info.innerText = `Número total de discos: ${discos.length}`;
    display.appendChild(titulo);
    display.appendChild(info);

}

function listarDiscos(orden) {
    let lista;
    let titulo = "Listado de discos por orden " + orden;
    switch (orden) {
        case "default":
            lista = discos;
            break;
        case "inverso":
            lista = discos.reverse();
            break;
        case "alfabetico":
            lista = discos.sort((primero, segundo) => primero.nombre.localeCompare(segundo.nombre));
            break;
    }
    actualizarLista(lista, titulo);
}

function consultarDisco(consulta, input) {
    const checkModal = document.querySelector("#displayCheckModal");
    let resultado;
    let item = document.createElement("li");
    titulo.innerText = "Consulta de discos por " + consulta + " \"" + input + "\"";
    
    if (consulta === "posicion") {
        input = Number(input);
        input -= 1;
        console.log(input);
        resultado = discos[input] ? discos[input].mostrarInformacion() : "No hay ningún disco en esa posición";
    } else {
        resultado = discos.find(disco => disco.nombre.toLowerCase() === input.toLowerCase());
        resultado = resultado ? resultado.mostrarInformacion() : "No hay ningún disco con ese nombre";
    }
    
    item.classList.add("info");
    item.innerHTML = resultado;
    
    display.innerHTML = "";
    display.appendChild(titulo);
    display.appendChild(item);
    checkModal.style.display = "none";
}

function actualizarLista(lista = discos, funcion) {
    display.innerHTML = "";
    titulo.innerText = funcion;
    display.appendChild(titulo);
    lista.forEach(disco => {
        let item = document.createElement("li");
        item.classList.add("info");
        item.innerHTML = disco.mostrarInformacion();
        display.appendChild(item);
    });
}

// Evento de formulario para agregar discos
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#añadir-disco").addEventListener("submit", function (e) {
        e.preventDefault();
        let nombre = document.querySelector("#nombre").value;
        let grupo = document.querySelector("#grupo").value;
        let año = document.querySelector("#año").value;
        let tipo = document.querySelector("#tipo").value;
        let localizacion = document.querySelector("#localizacion").value;
        let donde = document.querySelector("#donde").value;

        donde === "principio" ? inicio = true : inicio = false;
        
        let nuevoDisco = new Disco(nombre, grupo, año, tipo, localizacion);
        agregarDisco(nuevoDisco, inicio);
    });
});

// Evento de formulario para consultar discos
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#consultar-disco").addEventListener("submit", function (e) {
        e.preventDefault();
        let input = document.querySelector("#input").value;
        let consulta = document.querySelector("#consulta").value;

        consultarDisco(consulta, input);
    });
});