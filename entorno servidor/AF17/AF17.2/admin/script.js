// Obtener los modales y botones
const addRecipeModal = document.querySelector("#addRecipeModal");
const addCategoryModal = document.querySelector("#addCategoryModal");

// Abrir el modal para añadir receta
function openAddRecipeModal() {
    addRecipeModal.style.display = "flex";
}

function openAddCategoryModal() {
    addCategoryModal.style.display = "flex";
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    if (event.target == addRecipeModal) {
        addRecipeModal.style.display = "none";
    }
    if (event.target == addCategoryModal) {
        addCategoryModal.style.display = "none";
    }
}