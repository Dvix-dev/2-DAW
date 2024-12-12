let formulario = document.querySelector('form')
let correo_input = document.querySelector('input.mail').value

formulario.addEventListener('submit',(e)=> {
    let inputs = document.querySelectorAll('input.required')
    let mal = false
    e.preventDefault()
    inputs.forEach(element => {
        if (element.value === ""){
            mal = true
        }

    });
    if (mal){
        alert("Alguno de los campos no es correcto")
    }
})