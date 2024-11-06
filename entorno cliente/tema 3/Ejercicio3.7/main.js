let numeros = []


while (response != 0){
    
    var response = prompt("Escriba numeros para hacer la media\nIntroducir 0 para acabar")

    if (!isNaN(Number(response)) && response != 0) {
        numeros.push(response)
    } else if (response === null){
        
        response = 0
    } 
    else {
        continue
    }

}

if (numeros.includes(null)){
    alert("El usuario cerró el programa")
} else {
    var media = Media(numeros)
    alert("La media es " + media)
}


console.log(numeros)
function Media(array){
    var total = 0
    for (let element = 0; element < array.length; element++) {
        total += parseInt(array[element])
    }
    console.log(total, array.length)
    var media = total / array.length

    return media
}