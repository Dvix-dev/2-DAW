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
        return `Nombre: ${this.nombre}, Grupo: ${this.grupo}, Año: ${this.año}, Tipo: ${this.tipo}, Localización: ${this.localizacion}, Prestado: ${this.prestado}`;
    }
}

// Definicion de variables globales
let discos = [];

// Funciones
function agregarDisco(disco, alInicio = false) {
    if (alInicio) {
        discos.unshift(disco);
    } else {
        discos.push(disco);
    }
    actualizarLista();
}

function borrarDisco(alInicio = false) {
    if (discos.length > 0) {
        alInicio ? discos.shift() : discos.pop();
        actualizarLista();
    }
}

function mostrarNumeroDiscos() {
    alert(`Número total de discos: ${discos.length}`);
}

function mostrarListado(orden) {
    let lista;
    switch (orden) {
        case "normal":
            lista = discos;
            break;
        case "reves":
            lista = [...discos].reverse();
            break;
        case "alfabetico":
            lista = [...discos].sort((a, b) => a.nombre.localeCompare(b.nombre));
            break;
    }
    actualizarLista(lista);
}

function mostrarIntervalo(inicio, fin) {
    let intervalo = discos.slice(inicio, fin + 1);
    actualizarLista(intervalo);
}

function consultarDisco(criterio, valor) {
    let resultado;
    if (criterio === "posicion") {
        resultado = discos[valor] ? discos[valor].mostrarInformacion() : "No encontrado";
    } else {
        resultado = discos.find(disco => disco.nombre.toLowerCase() === valor.toLowerCase());
        resultado = resultado ? resultado.mostrarInformacion() : "No encontrado";
    }
    alert(resultado);
}

function actualizarLista(lista = discos) {
    const contenedor = document.getElementById("lista-discos");
    contenedor.innerHTML = "";
    lista.forEach(disco => {
        let item = document.createElement("li");
        item.textContent = disco.mostrarInformacion();
        contenedor.appendChild(item);
    });
}

// Evento de formulario para agregar discos
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#form-disco").addEventListener("submit", function (e) {
        e.preventDefault();
        let nombre = document.getElementById("nombre").value;
        let grupo = document.getElementById("grupo").value;
        let año = document.getElementById("año").value;
        let tipo = document.getElementById("tipo").value;
        let localizacion = document.getElementById("localizacion").value;
        let nuevoDisco = new Disco(nombre, grupo, año, tipo, localizacion);
        agregarDisco(nuevoDisco);
        this.reset();
    });
});
