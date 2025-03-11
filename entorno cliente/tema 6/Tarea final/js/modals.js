// Obtener los modales y botones
const addBtn = document.querySelector("#añadirDisco-btn");
const addModal = document.querySelector("#displayAddModal");
const checkBtn = document.querySelector("#consultarDisco-btn");
const checkModal = document.querySelector("#displayCheckModal");

// Abrir el modal para añadir un disco
addBtn.onclick = function() {
    addModal.style.display = "flex";
}

// Abrir el modal para Consultar un disco
checkBtn.onclick = function() {
    checkModal.style.display = "flex";
}

// Cerrar los modales si se hace clic fuera de ellos
window.onclick = function(event) {
    if (event.target == addModal) {
        addModal.style.display = "none";
    }
    if (event.target == checkModal) {
        checkModal.style.display = "none";
    }
}
