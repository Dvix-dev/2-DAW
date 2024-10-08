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


function FCM() {
    const contenedor = document.getElementById('center');
    contenedor.innerHTML = '';

    let edad = prompt("Por favor, ingresa tu edad:");
    let sexo = prompt("Por favor, ingresa tu sexo (hombre/mujer):").toLowerCase();

    if (isNaN(edad) || edad <= 0 || (sexo != 'hombre' && sexo != 'mujer')) {
        contenedor.innerHTML = 'Entrada inválida. Por favor, recarga la página y vuelve a intentarlo.';
        return;
    }

    let fcm;
    if (sexo === 'hombre') {
        fcm = 220 - edad;
    } else {
        fcm = 226 - edad;
    }

    contenedor.innerHTML = `<h1 class="FCM">Frecuencia Cardíaca Máxima</h1>
                            <p class="FCM">Su FCM es de <b>${fcm} bpm</b></p>
                            <h3 class="FCM">Zonas de Entrenamiento:</h3>`;

    const zonas = {
        recuperacion: { min: fcm * 0.6, max: fcm * 0.7 },
        aerobica: { min: fcm * 0.7, max: fcm * 0.8 },
        anaerobica: { min: fcm * 0.8, max: fcm * 0.9 },
        lineaRoja: { min: fcm * 0.9, max: fcm }
    };

    contenedor.insertAdjacentHTML('beforeend', `
        <ul class="FCM">
            <li>Zona de Recuperación (60%-70%): ${zonas.recuperacion.min.toFixed(2)} - ${zonas.recuperacion.max.toFixed(2)} bpm</li>
            <li>Zona Aeróbica (70%-80%): ${zonas.aerobica.min.toFixed(2)} - ${zonas.aerobica.max.toFixed(2)} bpm</li>
            <li>Zona Anaeróbica (80%-90%): ${zonas.anaerobica.min.toFixed(2)} - ${zonas.anaerobica.max.toFixed(2)} bpm</li>
            <li>Línea Roja (90%-100%): ${zonas.lineaRoja.min.toFixed(2)} - ${zonas.lineaRoja.max.toFixed(2)} bpm</li>
        </ul>
    `);
    

}


function SoccerCat() {
    const contenedor = document.getElementById('center');
    contenedor.innerHTML = '';
    const añoActual = new Date().getFullYear();
    let añoNacimiento = prompt("Ingresa tu año de nacimiento:");

    if (isNaN(añoNacimiento) || añoNacimiento < 1900 || añoNacimiento > añoActual) {
        contenedor.innerHTML = 'Entrada inválida. Por favor, recarga la página y vuelve a intentarlo.';
        return;
    }
    const edad = añoActual - añoNacimiento;
    let categoria;

    if (edad <= 6) {
        categoria = 'Micros';
    } else if (edad <= 12) {
        categoria = 'Infantil';
    } else if (edad <= 17) {
        categoria = 'Juvenil';
    } else {
        categoria = 'Senior';
    }
    contenedor.innerHTML = `<h1 class="categoria">Categoria Futbol</h1>
                            <p class="categoria">Tienes ${edad} años y perteneces a la categoría <b>${categoria}</b>.</p>
                            <h3 class="categoria">Categorías Disponibles:</h3>`;
 
    const categorias = ['Micros', 'Infantil', 'Juvenil', 'Senior'];
    const listaCategorias = categorias.map(cat => {
        if (cat === categoria) {
            return `<li class="destacada">${cat}</li>`;
        } else {
            return `<li>${cat}</li>`;
        }
    }).join('');
    contenedor.insertAdjacentHTML('beforeend', `<ul class="categoria">${listaCategorias}</ul>`);
}


// function TimeTable() {
//     const contenedor = document.getElementById('center')


// }