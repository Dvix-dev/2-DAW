var cont1 = 0
var cont2 = 0
var cont3 = 0
var cont4 = 0
var cont5 = 0
var cont6 = 0
var cont7 = 0
var cont8 = 0
var cont9 = 0
var cont10 = 0

for (let i = 0; i < 10000; i++) {
    const numeroAleatorio = Math.floor(Math.random() * 10) + 1
    if (numeroAleatorio == 1){
        cont1 += 1
    } else if (numeroAleatorio == 2){
        cont2 += 1
    } else if (numeroAleatorio == 3){
        cont3 += 1
    } else if (numeroAleatorio == 4){
        cont4 += 1
    } else if (numeroAleatorio == 5){
        cont5 += 1
    } else if (numeroAleatorio == 6){
        cont6 += 1
    } else if (numeroAleatorio == 7){
        cont7 += 1
    } else if (numeroAleatorio == 8){
        cont8 += 1
    } else if (numeroAleatorio == 9){
        cont9 += 1
    } else if (numeroAleatorio == 10){
        cont10 += 1
    }
}

alert(`----FRECUENCIAS----\nNumero 1: ${cont1} veces\nNumero 2: ${cont2} veces\nNumero 3: ${cont3} veces\nNumero 4: ${cont4} veces\nNumero 5: ${cont5} veces\nNumero 6: ${cont6} veces\nNumero 7: ${cont7} veces\nNumero 8: ${cont8} veces\nNumero 9: ${cont9} veces\nNumero 10: ${cont10} veces`)