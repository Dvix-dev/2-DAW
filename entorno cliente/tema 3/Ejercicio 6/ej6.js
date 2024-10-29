const numeros = [12, 45, 67, 23, 89, 34, 56, 78, 11, 90]

var menor = menorDelArray(numeros)

alert(`El menor numero del array es ${menor}`)

function menorDelArray(array){
    var menor = array[0]
    for (let i = 1; i < array.length; i++) {
        if (array[i] < menor) {
            menor = array[i];
        }       
    }
    return menor
}