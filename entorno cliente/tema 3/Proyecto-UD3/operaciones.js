// ##### DATABASE INICIAL #####
const socios = [
    { ID: 1, DNI: "12345678A", Name: "Juan", Lastname: "Pérez", Birthdate: "12/05/1990", Location: "Madrid", Category: "Senior" },
    { ID: 2, DNI: "23456789B", Name: "Ana", Lastname: "González", Birthdate: "20/08/1985", Location: "Barcelona", Category: "Senior" },
    { ID: 3, DNI: "34567890C", Name: "Carlos", Lastname: "López", Birthdate: "15/03/1980", Location: "Valencia", Category: "Senior" },
    { ID: 4, DNI: "45678901D", Name: "Maria", Lastname: "Martínez", Birthdate: "10/07/1992", Location: "Sevilla", Category: "Senior" },
    { ID: 5, DNI: "56789012E", Name: "Luis", Lastname: "Hernández", Birthdate: "05/11/1988", Location: "Zaragoza", Category: "Senior" },
    { ID: 6, DNI: "67890123F", Name: "Laura", Lastname: "García", Birthdate: "28/02/1995", Location: "Málaga", Category: "Senior" },
    { ID: 7, DNI: "78901234G", Name: "Pedro", Lastname: "Sánchez", Birthdate: "25/06/1991", Location: "Murcia", Category: "Senior" },
    { ID: 8, DNI: "89012345H", Name: "Carmen", Lastname: "Romero", Birthdate: "13/09/1987", Location: "Alicante", Category: "Senior" },
    { ID: 9, DNI: "90123456I", Name: "Javier", Lastname: "Díaz", Birthdate: "30/04/1993", Location: "Castellón", Category: "Senior" },
    { ID: 10, DNI: "01234567J", Name: "Sara", Lastname: "Álvarez", Birthdate: "22/01/1986", Location: "Vigo", Category: "Senior" },
    { ID: 11, DNI: "12345678K", Name: "Andrés", Lastname: "Cano", Birthdate: "05/12/1994", Location: "Oviedo", Category: "Senior" },
    { ID: 12, DNI: "23456789L", Name: "Beatriz", Lastname: "Vázquez", Birthdate: "17/10/1992", Location: "Gijón", Category: "Senior" },
    { ID: 13, DNI: "34567890M", Name: "Raúl", Lastname: "Moreno", Birthdate: "02/06/1989", Location: "Santander", Category: "Senior" },
    { ID: 14, DNI: "45678901N", Name: "Elena", Lastname: "Serrano", Birthdate: "11/11/1997", Location: "León", Category: "Senior" },
    { ID: 15, DNI: "56789012O", Name: "Felipe", Lastname: "Pérez", Birthdate: "19/08/1990", Location: "Logroño", Category: "Senior" },
    { ID: 16, DNI: "67890123P", Name: "Marta", Lastname: "Martínez", Birthdate: "04/12/1985", Location: "Salamanca", Category: "Senior" },
    { ID: 17, DNI: "78901234Q", Name: "José", Lastname: "Fernández", Birthdate: "21/07/1984", Location: "Toledo", Category: "Senior" },
    { ID: 18, DNI: "89012345R", Name: "Inés", Lastname: "Castro", Birthdate: "30/03/1996", Location: "Badajoz", Category: "Senior" },
    { ID: 19, DNI: "90123456S", Name: "Miguel", Lastname: "Suárez", Birthdate: "06/05/1999", Location: "Burgos", Category: "Senior" },
    { ID: 20, DNI: "01234567T", Name: "Paula", Lastname: "Gómez", Birthdate: "22/10/1993", Location: "Córdoba", Category: "Senior" },
    { ID: 21, DNI: "12345678U", Name: "Luis", Lastname: "Ramírez", Birthdate: "08/07/1995", Location: "Madrid", Category: "Senior" },
    { ID: 22, DNI: "23456789V", Name: "Elena", Lastname: "Torres", Birthdate: "18/12/1983", Location: "Sevilla", Category: "Senior" },
    { ID: 23, DNI: "34567890W", Name: "Carlos", Lastname: "Gómez", Birthdate: "14/01/1991", Location: "Madrid", Category: "Senior" },
    { ID: 24, DNI: "45678901X", Name: "María", Lastname: "López", Birthdate: "25/10/1992", Location: "Zaragoza", Category: "Senior" },
    { ID: 25, DNI: "56789012Y", Name: "Fernando", Lastname: "Serrano", Birthdate: "17/06/1987", Location: "Málaga", Category: "Senior" },
    { ID: 26, DNI: "67890123Z", Name: "Raquel", Lastname: "Jiménez", Birthdate: "19/02/1994", Location: "Barcelona", Category: "Senior" },
    { ID: 27, DNI: "78901234A", Name: "Pablo", Lastname: "González", Birthdate: "03/05/1986", Location: "Madrid", Category: "Senior" },
    { ID: 28, DNI: "89012345B", Name: "Sofía", Lastname: "Sánchez", Birthdate: "28/11/1993", Location: "Valencia", Category: "Senior" },
    { ID: 29, DNI: "90123456C", Name: "Alberto", Lastname: "Pérez", Birthdate: "22/09/1990", Location: "Valencia", Category: "Senior" },
    { ID: 30, DNI: "01234567D", Name: "Clara", Lastname: "García", Birthdate: "10/04/1991", Location: "Alicante", Category: "Senior" }
];


// CONTENDOR
var contenedor = document.querySelector('#center')

// ##### FUNCIONES PRINCIPALES #####
function GenRegisterForm(){
    contenedor.innerHTML = 
        `
        <div class="formRegister">
            <form>
                <h1 class="form_title">Formulario Alta Socio</h1>
                <div class="form_container">
                    <label>DNI*</label>
                    <div class="row">
                        <input type="text" name="DNI" placeholder="Introduzca su DNI" required>
                    </div>
                    <label>Nombre*</label>
                    <div class="row">
                        <input type="text" name="Name" placeholder="Introduzca su nombre" required>
                    </div>
                    <label>Apellidos*</label>
                    <div class="row">
                        <input type="text" name="Lastname" placeholder="Introduzca sus Apellidos" required>
                    </div>
                    <label>Fecha de Nacimiento*</label>
                    <div class="row">
                        <input type="date" name="Birthdate" required>
                    </div>
                    <label>Localidad*</label>
                    <div class="row">
                        <input type="text" name="Location" placeholder="Introduzca su localidad" required>
                    </div>
                </div>
                <div class="btn-row">
                    <button id="btn-submit" type="button" onclick='Register()'>Dar de Alta</button>
                </div>
            </form>
            <img class="formRegister-img" src="https://aedaweb.com/wp-content/uploads/2023/03/ALTA_2023.jpg" alt="">
        </div> 
        `
}

function GenDeregisterForm(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Formulario Baja Socio</h1>
            <div class="form_container">
                <label>DNI o ID*</label>
                <div class="row">
                    <input type="text" name="string" placeholder="Introduzca DNI o ID" required>
                </div>
                <div class="row">
                    <select name="opcion">
                        <option value="" selected disabled>-Seleccione una opcion-</option>
                        <option value="ID">Por ID</option>
                        <option value="DNI">Por DNI</option>
                    </select>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="submit">Dar de Baja</button>
            </div>
        </form>
        <img class="formDeregister-img" src="https://www.bizneo.com/blog/wp-content/uploads/2019/12/tipos-de-baja-laboral.jpg" alt="">
    </div> 
    `
}

function ChangeLocation(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Modificar Localidad</h1>
            <div class="form_container">
                <label>DNI*</label>
                <div class="row">
                    <input type="text" name="string" placeholder="Introduzca el DNI" required>
                </div>
                <label>Nueva Localidad*</label>
                <div class="row">
                    <input type="text" name="string" placeholder="Introduzca la nueva Localidad" required>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="submit">Modificar</button>
            </div>
        </form>
        <img class="changeLocation-img" src="https://img.freepik.com/fotos-premium/plantilla-plana-diseno-ilustraciones-puntos-interes_1248848-14009.jpg" alt="">
    </div> 
    `
}

function SearchByDNI(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Busqueda por DNI</h1>
            <div class="form_container">
                <label>DNI*</label>
                <div class="row">
                    <input type="text" name="string" placeholder="Introduzca su DNI" required>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="submit">Buscar</button>
            </div>
        </form>
        <img class="formSearchByDNI-img" src="https://neilpatel.com/wp-content/uploads/2021/02/facebook-search-operators-4.png" alt="">
    </div> 
    `
}

function SearchByCategory(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Busqueda por Categoria</h1>
            <div class="form_container">
                <label>Categoria*</label>
                <div class="row">
                    <input type="text" name="string" placeholder="Introduzca la Categoria" required>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="submit">Buscar</button>
            </div>
        </form>
        <img class="formSearchByCategory-img" src="https://mantpress.com/wp-content/uploads/11-08-21-%C2%BFCo%CC%81mo-agregar-la-bu%CC%81squeda-por-categori%CC%81a-en-tu-sitio-web-de-WordPress-1200x630.png" alt="">
    </div> 
    `
}

function SearchByLocation(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Busqueda por Localidad</h1>
            <div class="form_container">
                <label>Localidad*</label>
                <div class="row">
                    <input type="text" name="string" placeholder="Introduzca la Localidad" required>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="submit">Buscar</button>
            </div>
        </form>
        <img class="formSearchByDNI-img" src="https://igerent.com/_next/image?url=https%3A%2F%2Fres.cloudinary.com%2Fdudyf0uni%2Fimage%2Fupload%2Fv1710325335%2Flarge_Free_Trademark_Search_372c7f3724.webp&w=1920&q=75" alt="">
    </div> 
    `
}

function ShowUsers(){
    contenedor.innerHTML = '<h1 style="margin-bottom:10px;">Lista Socios</h1>'

    const tableheaders = ['ID','DNI','Name','Lastname','Birthdate','Location','Category']

    let tabla = document.createElement('table')
    
    
    for (let i = 0; i < socios.length; i++){
        let fila = document.createElement('tr')
        for (let j = 0; j < tableheaders.length; j++){
            let celda = document.createElement('td')
            celda.innerHTML=socios[i][tableheaders[j]]
            console.log(celda)
            fila.appendChild(celda)
        };
        tabla.appendChild(fila)
    };

    contenedor.appendChild(tabla)
}

console.log(socios[socios.length - 1]["ID"] + 1)

// ##### FUNCIONES AUXILIARES #####
function Register(){
    var ID = socios[socios.length - 1]["ID"] + 1
    console.log(ID)
    var DNI = document.querySelector('input[name="DNI"]').value
    var Name = document.querySelector('input[name="Name"]').value
    var Lastname = document.querySelector('input[name="Lastname"]').value
    var Birthdate = document.querySelector('input[name="Birthdate"]').value
    var Location = document.querySelector('input[name="Location"]').value
    
    const Currentyear = new Date().getFullYear();
    var Birthyear = Birthdate.split('/')[2]

    const Age = Currentyear - Birthyear;
    let Category;

    if (Age <= 6) {
        Category = 'Micros';
    } else if (Age <= 12) {
        Category = 'Infantil';
    } else if (Age <= 17) {
        Category = 'Juvenil';
    } else {
        Category = 'Senior';
    }

    var NewUser = { ID: ID, DNI: DNI, Name: Name, Lastname: Lastname, Birthdate: Birthdate, Location: Location, Category: Category}

    socios.push(NewUser)

    contenedor.innerHTML = '<h1>Socio añadido correctamente ✔</h1>'
}