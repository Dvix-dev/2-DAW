function IMC() {
    const contenedor = document.getElementById('center')

    contenedor.innerHTML = ('')

    let height = prompt("Introduzca su Altura (cm)")
    let weight = prompt("Introduzca su Peso (kg)") 
    
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
        contenedor.innerHTML = ('Comprueba los datos e intentelo de nuevo')
    }


}


function FCM() {
    const contenedor = document.getElementById('center');
    contenedor.innerHTML = '';

    let sexo = prompt("Ingresa tu sexo (hombre/mujer):").toLowerCase();
    let edad = prompt("Ingresa tu edad:");

    if (isNaN(edad) || edad <= 0 || (sexo != 'hombre' && sexo != 'mujer')) {
        contenedor.innerHTML = 'Comprueba los datos e intentalo de nuevo.';
        return;
    }

    let fcm;
    if (sexo === 'hombre') {
        fcm = 220 - edad;
    } else {
        fcm = 226 - edad;
    }

    contenedor.innerHTML = `<h1 class="FCM">Frecuencia Cardíaca Máxima</h1>
                            <p class="FCM">Su FCM es de <b>${fcm} lpm</b></p>
                            <h3 class="FCM">Zonas de Entrenamiento:</h3>`;

    const zonas = {
        recuperacion: { min: fcm * 0.6, max: fcm * 0.7 },
        aerobica: { min: fcm * 0.7, max: fcm * 0.8 },
        anaerobica: { min: fcm * 0.8, max: fcm * 0.9 },
        lineaRoja: { min: fcm * 0.9, max: fcm }
    };

    contenedor.insertAdjacentHTML('beforeend', `
        <ul class="FCM">
            <li>Zona de Recuperación (60%-70%): ${zonas.recuperacion.min.toFixed(1)} - ${zonas.recuperacion.max.toFixed(1)} lpm</li>
            <li>Zona Aeróbica (70%-80%): ${zonas.aerobica.min.toFixed(1)} - ${zonas.aerobica.max.toFixed(1)} lpm</li>
            <li>Zona Anaeróbica (80%-90%): ${zonas.anaerobica.min.toFixed(1)} - ${zonas.anaerobica.max.toFixed(1)} lpm</li>
            <li>Línea Roja (90%-100%): ${zonas.lineaRoja.min.toFixed(1)} - ${zonas.lineaRoja.max.toFixed(1)} lpm</li>
        </ul>
    `);
    

}


function SoccerCat() {
    const contenedor = document.getElementById('center');
    contenedor.innerHTML = '';
    const añoActual = new Date().getFullYear();
    let añoNacimiento = prompt("Ingresa tu año de nacimiento:");

    if (isNaN(añoNacimiento) || añoNacimiento < 1900 || añoNacimiento > añoActual) {
        contenedor.innerHTML = `Ingrese un año válido (entre 1900 y ${añoActual}).`;
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
                            <h3 class="categoria">Categorías Disponibles:</h3>
                            <ul>
                                <li id="micros">Micros</li>
                                <li id="infantil">Infantil</li>
                                <li id="juvenil">Juvenil</li>
                                <li id="senior">Senior</li>
                            </ul>
                            `;
    if (categoria == 'Micros') {
        document.getElementById('micros').style.backgroundColor = 'yellow'
    } else if (categoria == 'Infantil') {
        document.getElementById('infantil').style.backgroundColor = 'yellow'
    } else if (categoria == 'Juvenil') {
        document.getElementById('juvenil').style.backgroundColor = 'yellow'
    } else {
        document.getElementById('senior').style.backgroundColor = 'yellow'
    }
    // const categorias = ['Micros', 'Infantil', 'Juvenil', 'Senior'];
    // const listaCategorias = categorias.map(cat => {
    //     if (cat === categoria) {
    //         return `<li class="destacada">${cat}</li>`;
    //     } else {
    //         return `<li>${cat}</li>`;
    //     }
    // }).join('');
    // contenedor.insertAdjacentHTML('beforeend', `<ul class="categoria">${listaCategorias}</ul>`);
}


function TimeTable() {
    const contenedor = document.getElementById('center')
    contenedor.innerHTML = 
        `
        <h1>Horarios</h1>
        <div id="horarios">
            <table border="1px">
                <thead>MAÑANA</thead>
                <tbody>
                    <tr><td></td><td>Lunes</td><td>Martes</td><td>Miercoles</td><td>Jueves</td><td>Viernes</td></tr>
                    <tr><td>9:00 - 11:00</td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>11:00 - 13:00</td><td></td><td></td><td></td><td></td><td></td></tr>
                    <tr><td>13:00 - 15:00</td><td></td><td></td><td></td><td></td><td></td></tr>
                </tbody>
            </table>
            <table border="1px">
                <thead>TARDE</thead>
                <tbody>
                    <tr><td></td><td>Lunes</td><td>Martes</td><td>Miercoles</td><td>Jueves</td><td>Viernes<td>Sabado</td><td>Domingo</td></td></tr>
                    <tr><td>16:00 - 17:00</td><td></td><td></td><td></td><td></td><td><td></td><td></td></td></tr>
                    <tr><td>17:00 - 18:00</td><td></td><td></td><td></td><td></td><td><td></td><td></td></td></tr>
                    <tr><td>18:00 - 19:00</td><td></td><td></td><td></td><td></td><td><td></td><td></td></td></tr>
                    <tr><td>19:00 - 20:00</td><td></td><td></td><td></td><td></td><td><td></td><td></td></td></tr>
                    <tr><td>20:00 - 21:00</td><td></td><td></td><td></td><td></td><td><td></td><td></td></td></tr>
                </tbody>
            </table>
        </div>
        `
}