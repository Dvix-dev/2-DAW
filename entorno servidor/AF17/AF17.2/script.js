// Obtener los modales y botones
const addModal = document.querySelector("#addRecipeModal");
const filterModal = document.querySelector("#filterModal");
const addRecipeBtn = document.querySelector("#addRecipeBtn");
const filterBtn = document.querySelector("#filterBtn");

// Abrir el modal para añadir receta
addRecipeBtn.onclick = function() {
    addModal.style.display = "flex";
}

// Abrir el modal para filtrar recetas
filterBtn.onclick = function() {
    filterModal.style.display = "flex";
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    if (event.target == addModal) {
        addModal.style.display = "none";
    }
    if (event.target == filterModal) {
        filterModal.style.display = "none";
    }
}