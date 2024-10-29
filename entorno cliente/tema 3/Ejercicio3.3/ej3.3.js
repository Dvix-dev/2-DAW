for (let i = 0; i < 50; i++) {
    var numerosQuiniela = quiniela()
    console.log(numerosQuiniela)
}

function quiniela(){
    var numeros = []
    var numeroaleatorio = 0

    for (let i = 0; i < 6; i++) {
        numeroaleatorio = Math.floor(Math.random() * 49) + 1
        numeros.push(numeroaleatorio)
    }
    return numeros
}