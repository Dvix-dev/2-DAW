var valores = [true, 5, false, "hola", "adios", 2];

var texto1 = valores[3];
var texto2 = valores[4];
var mayorTexto = texto1 > texto2 ? texto1 : texto2;

alert("Elemento de texto mayor:", mayorTexto);

var bool1 = valores[0];
var bool2 = valores[2];

var andResultado = bool1 && bool2;
var orResultado = bool1 || bool2;

alert("Operacion AND:", andResultado);
alert("Operacion OR:", orResultado);

var num1 = valores[1]; 
var num2 = valores[5]; 

var suma = num1 + num2; 
var resta = num1 - num2; 

alert("Resultado de la suma:", suma);
alert("Resultado de la resta:", resta);
