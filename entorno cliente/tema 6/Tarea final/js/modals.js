// Obtener los modales y botones
const boton = document.querySelector(".funcionPrincipalBtn");
const modal = document.querySelector("#displayModal");

// Abrir el modal para añadir receta
boton.onclick = function() {
    modal.style.display = "flex";
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}