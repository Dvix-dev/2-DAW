function es_palindromo(input) {
    var textosinespacios = input.replaceAll(" ","").toLowerCase();
    
    var mediotextoalreves = textosinespacios.split('').reverse().join('');
    
    return mediotextoalreves === textosinespacios;
}

var userinput = prompt("Introduzca un palíndromo:");

if (es_palindromo(userinput)) {
    alert("Escribió un palíndromo");
} else {
    alert("Eso no es un palíndromo");
}
