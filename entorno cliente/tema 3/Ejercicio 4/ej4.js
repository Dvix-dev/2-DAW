var numeros = []

for (let i = 0; i < 5; i++) {
    random = Math.floor(Math.random() * 9)
    numeros.push(random)
}

console.log(numeros)

if (enterospositivos(numeros)){
    alert('Todos los numeros son enteros positivos')
} else {
    alert('Algun numero no es un entero positivo')
} 

var triplicados = []
for (let i = 0; i < numeros.length; i++) {
    triplicados.push(numeros[i] * 3) 
}

console.log(triplicados)

var resultado = 0

for (let i = 0; i < triplicados.length; i++) {
    resultado += triplicados[i]
}

alert(resultado)

function enterospositivos(numeros){
    for (let i = 0; i < numeros.length; i++) {
        if (numeros[i] <= 0){
            return false
        } else {
            continue
        }
    }
    return true
}