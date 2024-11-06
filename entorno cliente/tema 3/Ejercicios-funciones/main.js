// ################# EJERCICIOS #################

function Ejercicio1() {

    var num1 = prompt("Introduzca primer numero:")
    var num2 = prompt("Introduzca segundo numero:")

    suma = sumar(num1,num2)

    alert(`La suma de ${num1} y ${num2} es igual a ${suma}`)

    return suma
}

function Ejercicio2() {
   const numeros = [4,65575,5,544,54,897,4654,4,56,489,654,564897,87,897878,654,87]
   var max = mayor(numeros)

   alert(`Numeros: ${numeros}\n\nEl mayor numero es ${max}`)
}

function Ejercicio3() {
    var text = prompt("Introduzca una cadena de texto para decir el numero de vocales:")

    n_vocales = contarVocales(text)

    alert(`El texto indicado tiene ${n_vocales} vocales`)
}

function Ejercicio4() {
   const palabras = ["hola","Coche","PeRRo","nEUmaTiCo"]
   var palabrasMayusculas = aMayusculas(palabras)

   alert(`Palabras:\n${palabras}\n\nMayusculas:\n${palabrasMayusculas}`)
}

function Ejercicio5() {
    let num = prompt("Introduzca un numero:")

    let v_booleano = esPrimo(num)

    if (v_booleano){
        alert(`El numero ${num} es primo.`)
    } else {
        alert(`El numero ${num} NO es primo.`)
    }
}

function Ejercicio6() {
    const array1 = [2,'mandril','hola','perro',37,'S','pajaro']
    const array2 = [8,37,'hola','gato','5','mandril']

    let comunes = elementosComunes(array1,array2)

    alert(`Array1:\n${array1}\n\nArray2:\n${array2}\n\nComunes:\n${comunes}`)
}

function Ejercicio7() {
    const numeros = [4,2,7,6,1,3,4]

    let resultado = sumaPares(numeros)

    alert (`Numeros:\n${numeros}\n\nSuma de pares: ${resultado}`)
}

function Ejercicio8() {
    const numeros = [4,6,8,7,6,1,3]
    
    elevados = elevarArray(numeros)

    alert (`Numeros:\n${numeros}\n\nNumeros elevados: ${elevados}`)
}

function Ejercicio9() {
    var text = prompt("Introduzca una cadena de texto para invertir:")

    var reverse = invertir(text)

    alert(`Original\n${text}\n\nInvertido\n${reverse}`)
}

function Ejercicio10() {
    var numero = prompt("Introduzca un numero para su factorial:")

    var resultado = factorial(numero)

    alert(`El factorial ${numero}! es ${resultado}`)
}


// ################# FUNCIONES #################

function sumar(a,b){
    a = Number(a)
    b = Number(b)

    var suma = a + b

    return suma
}

function mayor(array){
    var mayor = null
    mayor = array[0]
    for (i=0; i < array.length; i++){
        if (array[i] > mayor){
            mayor = array[i]
        }
    }
    return mayor
}

function contarVocales(str){
    const vocales = ['a','e','i','o','u']
    var n_vocales = 0
    var str = str.toLowerCase()

    for (i = 0; i < str.length; i++){
        if (vocales.includes(str[i])){
            n_vocales += 1
        }
    }
    return n_vocales
}

function aMayusculas(array){
    var enMayus = []

    for (i = 0; i < array.length; i++){
        enMayus[i] = array[i].toUpperCase()
    }

    return enMayus
}

function esPrimo(num){
    num = Math.abs(num)
    for (let index = 2; index < num; index++) {
        if (num % index === 0) {
            return false
        }        
    }
    return true
}

function elementosComunes(array1,array2){
    let comunes = []

    array1.forEach(element1 => {
        array2.forEach(element2 => {
            if (element1 === element2){
                comunes.push(element1)
            }
        })
    })

    if (comunes.length > 0){
        return comunes
    } else {
        return "No hay comunes"
    }
}

function sumaPares(array){
    let pares = []
    let sumapares = 0

    array.forEach(num => {
        if (num % 2 == 0){
            pares.push(num)
        }
    })

    pares.forEach(par => {
        sumapares += par
    });
    
    return sumapares
}

function elevarArray(array){
    let elevados = []

    array.forEach(element => {
        elevados.push(element**2)
    });

    return elevados
}

function invertir(texto){
    return texto.split('').reverse().join('')
}

function factorial(numero){
    let fact = 1

    for (let i = 1; i <= numero; i++){
        fact *= i
    }

    return fact
}
