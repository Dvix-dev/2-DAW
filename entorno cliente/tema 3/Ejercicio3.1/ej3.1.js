var texto = prompt("Introduzca un texto a cifrar:");
var clave = prompt("Introduzca la clave del cifrado:");

clave = parseInt(clave);

cifrar(texto, clave);

function cifrar(texto, clave) {
    let resultado = '';

    for (let i = 0; i < texto.length; i++) {
        let codigoCaracter = texto.charCodeAt(i);
        let caracterCifrado = String.fromCharCode(codigoCaracter + clave);
        resultado += caracterCifrado;
    }

    alert('Texto cifrado: ' + resultado);
}
