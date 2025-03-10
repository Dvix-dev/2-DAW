// Definicion de clases
export class Disco {
    // Constructor
    constructor(nombre, grupo, año, tipo, localizacion) {
        this.nombre = nombre;
        this.grupo = grupo;
        this.año = año;
        this.tipo = tipo;
        this.localizacion = localizacion;
        this.prestado = false;
    }

    // Metodos
    cambiarLocalizacion(nuevaLocalizacion) {
        this.localizacion = nuevaLocalizacion;
    }

    cambiarPrestado() {
        this.prestado = !this.prestado;
    }

    mostrarInformacion() {
        return `Nombre: ${this.nombre}, Grupo: ${this.grupo}, Año: ${this.año}, Tipo: ${this.tipo}, Localización: ${this.localizacion}, Prestado: ${this.prestado}`;
    }
}