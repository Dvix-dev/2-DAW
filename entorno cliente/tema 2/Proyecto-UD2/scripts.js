

function IMC() {
    const contenedor = document.getElementById('center')

    contenedor.innerHTML = ('')

    let height = prompt("Introduzca su Altura (cm)")
    let weight = prompt("Introduzca su peso (kg)") 
    
    height/= 100

    let IMC = weight / height**2

    contenedor.innerHTML = (`<h1 class="IMC">IMC</h1><br><p class="IMC">Su IMC es de <b>${IMC.toFixed(2)}</b></p><br><p class="IMC">Usted tiene:</p><br>`)

    if (IMC < 16) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: red;">Infrapeso (Delgadez severa)</h2>');
    } else if (IMC >= 16 && IMC < 17) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: #ffb800;">Infrapeso (Delgadez moderada)</h2>');
    } else if (IMC >= 17 && IMC < 18.5) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: #94ff00;">Infrapeso (Delgadez aceptable)</h2>');
    } else if (IMC >= 18.5 && IMC < 25) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: #00ff3d;">Peso normal</h2>');
    } else if (IMC >= 25 && IMC < 30) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: #00ffc5;">Sobrepeso</h2>');
    } else if (IMC >= 30 && IMC < 35) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: #00b1ff;">Obesidad (Tipo I)</h2>');
    } else if (IMC >= 35 && IMC < 40) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: #0087ff;">Obesidad (Tipo II)</h2>');
    } else if (IMC >= 40) {
        contenedor.insertAdjacentHTML('beforeend', '<h2 class="IMC" style="color: blue;">Obesidad (Tipo III)</h2>');
    } else {
        contenedor.innerHTML = ('Algo salió mal, compruebe que los datos introducidos son correctos e intentelo de nuevo')
    }


}

// function FCM() {
//     const contenedor = document.getElementById('center')


// }

// function SoccerCat() {
//     const contenedor = document.getElementById('center')


// }

// function TimeTable() {
//     const contenedor = document.getElementById('center')


// }