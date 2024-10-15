// function es_palindromo(){
//     var textosinespacios = input.trim().toLowerCase()
//     var mediotextoalreves = []
//     var contador = 0
//     for(i=textosinespacios.length;i>textosinespacios.length/2;i--){
//         mediotextoalreves[contador] = textosinespacios[i]
//         contador++
//     }
//     if (mediotextoalreves == textosinespacios.slice(0,textosinespacios.length/2)){
//         return true
//     } else {
//         return false
//     }
// }

// var userinput = prompt("Introduzca un palíndromo:")

// if (es_palindromo()){
//     alert("Escribió un palíndromo")
//     } else {
//         alert("Eso no es un palíndromo")
//     }

function es_palindromo(input) {
    var textosinespacios = input.trim().toLowerCase();
    
    var mediotextoalreves = textosinespacios.split('').reverse().join('');
    
    return mediotextoalreves === textosinespacios;
}

var userinput = prompt("Introduzca un palíndromo:");

if (es_palindromo(userinput)) {
    alert("Escribió un palíndromo");
} else {
    alert("Eso no es un palíndromo");
}
