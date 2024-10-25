function Ejercicio1() {
    // Nº de vocales

    const vocals = ["a","e","i","o","u"]
    var contador = 0

    var param = prompt("Introduzca una cadena de texto para decir el numero de vocales:")

    for (let i = 0; i < param.length; i++) {
        if (vocals.includes(param[i].toLowerCase())) {
            contador++
        }
        
    }

    alert("El string introducido tiene " + contador + " vocales.")
}

function Ejercicio2() {
    // Invertir cadena con y sin metodos

    var param = prompt("Introduzca una cadena de texto para invertir:")

    // Con metodos
    var con_metodos = param.split('').reverse().join('')

    // Sin metodos
    var sin_metodos = ''
    for (let i = param.length-1; i >= 0; i--) {
        sin_metodos += param[i];
    }
    alert(`Original\n${param}\n\nCon Metodos\n${con_metodos}\n\nSin Metodos\n${sin_metodos}`)

}

function Ejercicio3() {
    var contador = 0

    var param = prompt("Introduzca una cadena de texto para decir el numero de espacios:")

    for (let i = 0; i < param.length; i++) {
        if (param[i] == " ") {
            contador++
        }
        
    }

    alert("El string introducido tiene " + contador + " espacios.")
}

function Ejercicio4() {
    var param = prompt("Introduzca una cadena de texto para cambiar las 'a' por 'o':")

    textomodificado = param.replaceAll("a","o")

    alert(textomodificado)
}

function Ejercicio5() {
    var param1 = prompt("Introduzca una primera cadena:")
    var param2 = prompt("Introduzca una segunda cadena:")

    var cadenasjuntas = param1 + param2

    alert(cadenasjuntas)
}

function Ejercicio6() {

}

function Ejercicio7() {
    var param = prompt("Introduzca una cadena de texto para medir su longitud:")

    var medida = param.length

    alert ("La cadena tiene una medida de " + medida + " carácteres")
}

function Ejercicio8() {

}
