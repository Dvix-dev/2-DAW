const nombres = new Set();
let nombre;

while (true) {
    nombre = prompt("Introduce un nombre (escribe 'fin' para terminar):");
    if (nombre === null || nombre.trim().toLowerCase() === 'fin') {
        break;
    }
    if (nombres.has(nombre)) {
        alert('El nombre ya está registrado. Por favor, introduce otro.');
    } else {
        nombres.add(nombre.trim());
    }
}

const arrayNombres = Array.from(nombres);
const grupos = [];
let indice = 0;

while (indice < arrayNombres.length) {
    const grupo = arrayNombres.slice(indice, indice + 3);
    grupos.push(grupo);
    indice += 3;
}

const sobrantes = arrayNombres.slice(indice);
while (sobrantes.length > 0) {
    const grupoAleatorio = Math.floor(Math.random() * grupos.length);
    grupos[grupoAleatorio].push(sobrantes.pop());
}

let resultado = '';
grupos.forEach((grupo, index) => {
    resultado += `Grupo ${index + 1}: ${grupo.join(', ')}\n`;
});

alert(resultado);
