// ##### DATABASE INICIAL #####
const socios = [
    { ID: 1, DNI: "12345678A", Name: "Juan", Lastname: "Pérez", Birthdate: "1990-05-12", Location: "Madrid" },
    { ID: 2, DNI: "23456789B", Name: "Ana", Lastname: "González", Birthdate: "1985-08-20", Location: "Barcelona" },
    { ID: 3, DNI: "34567890C", Name: "Carlos", Lastname: "López", Birthdate: "1980-03-15", Location: "Valencia" },
    { ID: 4, DNI: "45678901D", Name: "Maria", Lastname: "Martínez", Birthdate: "1992-07-10", Location: "Sevilla" },
    { ID: 5, DNI: "56789012E", Name: "Luis", Lastname: "Hernández", Birthdate: "1988-11-05", Location: "Zaragoza" },
    { ID: 6, DNI: "67890123F", Name: "Laura", Lastname: "García", Birthdate: "1995-02-28", Location: "Málaga" },
    { ID: 7, DNI: "78901234G", Name: "Pedro", Lastname: "Sánchez", Birthdate: "1991-06-25", Location: "Murcia" },
    { ID: 8, DNI: "89012345H", Name: "Carmen", Lastname: "Romero", Birthdate: "1987-09-13", Location: "Alicante" },
    { ID: 9, DNI: "90123456I", Name: "Javier", Lastname: "Díaz", Birthdate: "1993-04-30", Location: "Castellón" },
    { ID: 10, DNI: "01234567J", Name: "Sara", Lastname: "Álvarez", Birthdate: "1986-01-22", Location: "Vigo" },
    { ID: 11, DNI: "12345678K", Name: "Andrés", Lastname: "Cano", Birthdate: "1994-12-05", Location: "Oviedo" },
    { ID: 12, DNI: "23456789L", Name: "Beatriz", Lastname: "Vázquez", Birthdate: "1992-10-17", Location: "Gijón" },
    { ID: 13, DNI: "34567890M", Name: "Raúl", Lastname: "Moreno", Birthdate: "1989-06-02", Location: "Santander" },
    { ID: 14, DNI: "45678901N", Name: "Elena", Lastname: "Serrano", Birthdate: "1997-11-11", Location: "León" },
    { ID: 15, DNI: "56789012O", Name: "Felipe", Lastname: "Pérez", Birthdate: "1990-08-19", Location: "Logroño" },
    { ID: 16, DNI: "67890123P", Name: "Marta", Lastname: "Martínez", Birthdate: "1985-12-04", Location: "Salamanca" },
    { ID: 17, DNI: "78901234Q", Name: "José", Lastname: "Fernández", Birthdate: "1984-07-21", Location: "Toledo" },
    { ID: 18, DNI: "89012345R", Name: "Inés", Lastname: "Castro", Birthdate: "1996-03-30", Location: "Badajoz" },
    { ID: 19, DNI: "90123456S", Name: "Miguel", Lastname: "Suárez", Birthdate: "1999-05-06", Location: "Burgos" },
    { ID: 20, DNI: "01234567T", Name: "Paula", Lastname: "Gómez", Birthdate: "1993-10-22", Location: "Córdoba" },
    { ID: 21, DNI: "12345678U", Name: "Luis", Lastname: "Ramírez", Birthdate: "1995-07-08", Location: "Madrid" },
    { ID: 22, DNI: "23456789V", Name: "Elena", Lastname: "Torres", Birthdate: "1983-12-18", Location: "Sevilla" },
    { ID: 23, DNI: "34567890W", Name: "Carlos", Lastname: "Gómez", Birthdate: "1991-01-14", Location: "Madrid" },
    { ID: 24, DNI: "45678901X", Name: "María", Lastname: "López", Birthdate: "1992-10-25", Location: "Zaragoza" },
    { ID: 25, DNI: "56789012Y", Name: "Fernando", Lastname: "Serrano", Birthdate: "1987-06-17", Location: "Málaga" },
    { ID: 26, DNI: "67890123Z", Name: "Raquel", Lastname: "Jiménez", Birthdate: "1994-02-19", Location: "Barcelona" },
    { ID: 27, DNI: "78901234A", Name: "Pablo", Lastname: "González", Birthdate: "1986-05-03", Location: "Madrid" },
    { ID: 28, DNI: "89012345B", Name: "Sofía", Lastname: "Sánchez", Birthdate: "1993-11-28", Location: "Valencia" },
    { ID: 29, DNI: "90123456C", Name: "Alberto", Lastname: "Pérez", Birthdate: "1990-09-22", Location: "Valencia" },
    { ID: 30, DNI: "01234567D", Name: "Clara", Lastname: "García", Birthdate: "1991-04-10", Location: "Alicante" }
];

var contenedor = document.querySelector('#center')
function GenRegisterForm(){
    contenedor.innerHTML = 
        `
        <div class="formRegister">
            <form>
                <h1 class="form_title">Formulario Alta Socio</h1>
                <div class="form_container">
                    <label>DNI*</label>
                    <div class="row">
                        <input type="text" name="string" placeholder="Introduzca su DNI" required>
                    </div>
                    <label>Nombre*</label>
                    <div class="row">
                        <input type="text" name="string" placeholder="Introduzca su nombre" required>
                    </div>
                    <label>Apellidos*</label>
                    <div class="row">
                        <input type="text" name="string" placeholder="Introduzca sus Apellidos" required>
                    </div>
                    <label>Fecha de Nacimiento*</label>
                    <div class="row">
                        <input type="date" name="string" placeholder="Introduzca su nombre" required>
                    </div>
                    <label>Localidad*</label>
                    <div class="row">
                        <input type="text" name="string" placeholder="Introduzca su localidad" required>
                    </div>
                </div>
                <div class="btn-row">
                    <button id="btn-submit" type="submit">Dar de Alta</button>
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