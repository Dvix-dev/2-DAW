var numero = prompt('Introduzca un numero')

var suma = 0

if (esEntero(numero)){
    var numeroIterable = numero.toString()
    for (let i = 0; i < numeroIterable.length; i++) {
        suma += Number(numeroIterable[i])
    }
} else {
    var partes = numero.split('.')
    var parteEntera = Number(partes[0])
    var parteDecimal = Number(partes[1])
    suma = parteEntera + parteDecimal
}

alert(suma)

function esEntero(numero){
    if (numero % 1 === 0) {
        return true
    } else {
        return false
    }
}