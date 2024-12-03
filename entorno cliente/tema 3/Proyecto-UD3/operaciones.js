// ##### DATABASE INICIAL #####
const Currentyear = new Date().getFullYear();
const socios = [
    { ID: 1, DNI: "12345678A", Name: "Juan", Lastname: "Pérez", Birthdate: "2019-05-12", Location: "Madrid"},
    { ID: 2, DNI: "23456789B", Name: "Ana", Lastname: "González", Birthdate: "2006-08-20", Location: "Barcelona"},
    { ID: 3, DNI: "34567890C", Name: "Carlos", Lastname: "López", Birthdate: "2014-03-15", Location: "Málaga"},
    { ID: 4, DNI: "45678901D", Name: "Maria", Lastname: "Martínez", Birthdate: "2016-07-10", Location: "Sevilla"},
    { ID: 5, DNI: "56789012E", Name: "Luis", Lastname: "Hernández", Birthdate: "2000-11-05", Location: "Zaragoza"},
    { ID: 6, DNI: "67890123F", Name: "Laura", Lastname: "García", Birthdate: "2008-02-28", Location: "Málaga"},
    { ID: 7, DNI: "78901234G", Name: "Pedro", Lastname: "Sánchez", Birthdate: "2022-06-25", Location: "Madrid"},
    { ID: 8, DNI: "89012345H", Name: "Carmen", Lastname: "Romero", Birthdate: "2016-09-13", Location: "Alicante"},
    { ID: 9, DNI: "90123456I", Name: "Javier", Lastname: "Díaz", Birthdate: "1993-04-30", Location: "Castellón"},
    { ID: 10, DNI: "01234567J", Name: "Sara", Lastname: "Álvarez", Birthdate: "1986-01-22", Location: "Córdoba"},
    { ID: 11, DNI: "12345678K", Name: "Andrés", Lastname: "Cano", Birthdate: "2009-12-05", Location: "Oviedo"},
    { ID: 12, DNI: "23456789L", Name: "Beatriz", Lastname: "Vázquez", Birthdate: "1992-10-17", Location: "Málaga"},
    { ID: 13, DNI: "34567890M", Name: "Raúl", Lastname: "Moreno", Birthdate: "1989-06-02", Location: "Santander"},
    { ID: 14, DNI: "45678901N", Name: "Elena", Lastname: "Serrano", Birthdate: "1997-11-11", Location: "León"},
    { ID: 15, DNI: "56789012O", Name: "Felipe", Lastname: "Pérez", Birthdate: "2009-08-19", Location: "Logroño"},
    { ID: 16, DNI: "67890123P", Name: "Marta", Lastname: "Martínez", Birthdate: "1985-12-04", Location: "Madrid"},
    { ID: 17, DNI: "78901234Q", Name: "José", Lastname: "Fernández", Birthdate: "2012-07-21", Location: "Toledo"},
    { ID: 18, DNI: "89012345R", Name: "Inés", Lastname: "Castro", Birthdate: "1996-03-30", Location: "Badajoz"},
    { ID: 19, DNI: "90123456S", Name: "Miguel", Lastname: "Suárez", Birthdate: "2016-05-06", Location: "Burgos"},
    { ID: 20, DNI: "01234567T", Name: "Paula", Lastname: "Gómez", Birthdate: "2009-10-22", Location: "Madrid"}
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
                    <input type="text" name="busqueda" placeholder="Introduzca DNI o ID" required>
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
                <button id="btn-submit" type="button" onclick='Deregister()'>Dar de Baja</button>
            </div>
        </form>
        <img class="formDeregister-img" src="https://www.bizneo.com/blog/wp-content/uploads/2019/12/tipos-de-baja-laboral.jpg" alt="">
    </div> 
    `
}

function ChangeLocationForm(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Modificar Localidad</h1>
            <div class="form_container">
                <label>DNI*</label>
                <div class="row">
                    <input type="text" name="busqueda" placeholder="Introduzca el DNI" required>
                </div>
                <label>Nueva Localidad*</label>
                <div class="row">
                    <input type="text" name="newlocation" placeholder="Introduzca la nueva Localidad" required>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="button" onclick="ChangeLocation()">Modificar</button>
            </div>
        </form>
        <img class="changeLocation-img" src="https://img.freepik.com/fotos-premium/plantilla-plana-diseno-ilustraciones-puntos-interes_1248848-14009.jpg" alt="">
    </div> 
    `
}

function SearchByDNIForm(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Busqueda por DNI</h1>
            <div class="form_container">
                <label>DNI*</label>
                <div class="row">
                    <input type="text" name="busqueda" placeholder="Introduzca su DNI" required>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="button" onclick="SearchByDNI()">Buscar</button>
            </div>
        </form>
        <img class="formSearchByDNI-img" src="https://neilpatel.com/wp-content/uploads/2021/02/facebook-search-operators-4.png" alt="">
    </div> 
    `
}

function SearchByCategoryForm(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Busqueda por Categoria</h1>
            <div class="form_container">
                <label>Categoria*</label>
                <div class="row">
                    <select name="opcion">
                        <option value="" selected disabled>-Seleccione una categoría-</option>
                        <option value="Micros">Micros</option>
                        <option value="Infantil">Infantil</option>
                        <option value="Juvenil">Juvenil</option>
                        <option value="Senior">Senior</option>
                    </select>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="button" onclick="SearchByCategory()">Buscar</button>
            </div>
        </form>
        <img class="formSearchByCategory-img" src="https://mantpress.com/wp-content/uploads/11-08-21-%C2%BFCo%CC%81mo-agregar-la-bu%CC%81squeda-por-categori%CC%81a-en-tu-sitio-web-de-WordPress-1200x630.png" alt="">
    </div> 
    `
}

function SearchByLocationForm(){
    contenedor.innerHTML =
    `
    <div class="formRegister">
        <form>
            <h1 class="form_title">Busqueda por Localidad</h1>
            <div class="form_container">
                <label>Localidad*</label>
                <div class="row">
                    <input type="text" name="busqueda" placeholder="Introduzca la Localidad" required>
                </div>
            </div>
            <div class="btn-row">
                <button id="btn-submit" type="button" onclick="SearchByLocation()">Buscar</button>
            </div>
        </form>
        <img class="formSearchByDNI-img" src="https://igerent.com/_next/image?url=https%3A%2F%2Fres.cloudinary.com%2Fdudyf0uni%2Fimage%2Fupload%2Fv1710325335%2Flarge_Free_Trademark_Search_372c7f3724.webp&w=1920&q=75" alt="">
    </div> 
    `
}

function ShowUsers(array){
    contenedor.innerHTML = '<h1 style="margin-bottom:10px;">Lista Socios</h1>'

    const tableheaders = ['ID','DNI','Name','Lastname','Birthdate','Location','Category']

    let tabla = document.createElement('table')

    let header = document.createElement('tr')

    tableheaders.forEach(element => {
        let celda = document.createElement('th')
        celda.innerHTML=element
        header.appendChild(celda)
    });
    tabla.appendChild(header)
    
    for (let i = 0; i < array.length; i++){
        let fila = document.createElement('tr')
        for (let j = 0; j < tableheaders.length - 1; j++){
            let celda = document.createElement('td')
            celda.innerHTML=array[i][tableheaders[j]]
            fila.appendChild(celda)
        };
        let categoria = GetCategory(array[i]['Birthdate'])
        let celda = document.createElement('td')
        celda.innerHTML=categoria
        fila.appendChild(celda)
        tabla.appendChild(fila)
    };

    contenedor.appendChild(tabla)
}

// ##### FUNCIONES AUXILIARES #####
function Register(){
    var ID = socios[socios.length - 1]["ID"] + 1
    var DNI = document.querySelector('input[name="DNI"]').value
    var Name = document.querySelector('input[name="Name"]').value
    var Lastname = document.querySelector('input[name="Lastname"]').value
    var Birthdate = document.querySelector('input[name="Birthdate"]').value
    var Location = document.querySelector('input[name="Location"]').value
    var Category = GetCategory(Birthdate)

    var NewUser = { ID: ID, DNI: DNI, Name: Name, Lastname: Lastname, Birthdate: Birthdate, Location: Location, Category: Category}

    // GENERAR ERRORES
    var errors = []
    if (socios.some(socio => socio.DNI === DNI)){
        mensaje = "El DNI <b>"+DNI+"</b> ya se encuenta en uso";
        errors.push(mensaje)
    }
    

    if (errors.length == 0){
        socios.push(NewUser)
        contenedor.innerHTML = '<h1>Socio añadido correctamente ✔</h1>'
    } else {
        contenedor.innerHTML = '<h1>No se ha añadido el socio:</h1>'
        contenedor.insertAdjacentHTML("beforeend",'<ul>')
        console.log(errors)
        errors.forEach(error => {
            contenedor.insertAdjacentHTML("beforeend",'<li>'+error+'</li>')
        });
        contenedor.insertAdjacentHTML("beforeend",'</ul>')
    }
}

function Deregister(){
    var busqueda = document.querySelector('input[name="busqueda"]').value
    var opcion = document.querySelector('select[name="opcion"]').value
    var encontrado = false

    switch (opcion) {
        case "DNI":
            for(i=0; i < socios.length; i++){
                if (socios[i]['DNI'] == busqueda){
                    encontrado = true
                    var posicion = i
                    break
                }
            }
            if (encontrado) {
                delete(socios[posicion])
            } else {
                let mensaje = "El DNI "+busqueda+" no se encontró"
            }
            break;
    
        case "ID":
            for(i=0; i < socios.length; i++){
                if (socios[i]['ID'] == busqueda){
                    encontrado = true
                    var posicion = i
                    break
                }
            }
            if (encontrado) {
                delete(socios[posicion])
            } else {
                let mensaje = "El DNI "+busqueda+" no se encontró"
            }
            break;
    }

    if (encontrado){
        contenedor.innerHTML = '<h1>Socio eliminado correctamente ✔</h1>'
    } else {
            contenedor.innerHTML = '<h1>No se ha podido eliminar el socio:</h1>'
            contenedor.insertAdjacentHTML("beforeend",mensaje)     
    }

}

function ChangeLocation() {

}

function SearchByDNI() {
    var busqueda = document.querySelector('input[name="busqueda"]').value
    var result = []
    socios.forEach(socio => {
        if (socio['DNI'] == busqueda){
            result.push(socio)
        }
    });
    if (result.length > 0){
        ShowUsers(result)
    } else {
        contenedor.innerHTML = '<h1>No se pudo encontrar ningún socio con ese DNI</h1>'
    }
}

function SearchByCategory() {
    var busqueda = document.querySelector('select[name="opcion"]').value
    var result = []
    console.log('Busqueda: '+busqueda)
    socios.forEach(socio => {
        var Category = GetCategory(socio['Birthdate'])
        console.log(Category)
        if (Category == busqueda){
            console.log("Estoy dentro del IF")
            result.push(socio)
        }
    });
    if (result.length > 0){
        ShowUsers(result)
    } else {
        contenedor.innerHTML = '<h1>No se pudo encontrar ningún socio perteneciente a esa categoría</h1>'
    }
}

function SearchByLocation() {
    var busqueda = document.querySelector('input[name="busqueda"]').value
    var result = []
    socios.forEach(socio => {
        if (socio['Location'] == busqueda){
            result.push(socio)
        }
    });
    if (result.length > 0){
        ShowUsers(result)
    } else {
        contenedor.innerHTML = '<h1>No se pudo encontrar ningún socio de esa Localidad</h1>'
    }
}

function GetCategory(Birthdate){
    const Currentyear = new Date().getFullYear();
    var Birthyear = Birthdate.split('-')[0]

    const Age = Currentyear - Birthyear;
    let Category;

    if (Age <= 6) {
        Category = 'Micros';
    } else if (Age <= 12) {
        Category = 'Infantil';
    } else if (Age <= 17) {
        Category = 'Juvenil';
    } else if (Age <= 110){
        Category = 'Senior';
    } else {
        Category = 'Sin especificar';
    }

    return Category
}