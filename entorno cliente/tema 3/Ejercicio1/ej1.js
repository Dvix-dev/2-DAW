var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
var DNI = prompt("Introduzca DNI:")
var DNInums = DNI.slice(0,8)

if (DNI.slice(0,8) < 99999999 && DNI.slice(0,8) > 0 && DNI.length == 9){
    var resto = DNInums % 23
    var letra = letras[resto]
    var userletra = DNI.slice(8,9).toLocaleUpperCase()

    if (userletra == letra){
        alert("Su DNI es correcto")
    } else {
        alert("La letra del DNI no es valida")
    }
} else {
    alert("El numero no es valido")
}