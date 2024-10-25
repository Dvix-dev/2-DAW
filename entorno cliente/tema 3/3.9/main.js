var container = []

for (let contador = 0; contador < 20; contador++) {

    let n_aleatorio = Math.floor(Math.random() * 50) + 1

    container.push(n_aleatorio)   
}

for (let cont = 0; cont < container.length; cont++) {
    for (let cont2 = 0; cont2 < container[cont]; cont2++) {
        document.write("*")
        
    }
    document.write("<br>")
}