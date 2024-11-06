const modulos = new Map();

modulos.set("DWECL", { nombre: "Desarrollo Web en Entorno Cliente", duracion: "6 meses", numAlumnos: 30 });
modulos.set("DAW", { nombre: "Desarrollo de Aplicaciones Web", duracion: "12 meses", numAlumnos: 28 });
modulos.set("DI", { nombre: "Diseño de Interfaces", duracion: "6 meses", numAlumnos: 13 });

// Muestra cuántos módulos hay almacenados
console.log(`Número de módulos almacenados: ${modulos.size}`);

// Muestra el contenido de la estructura
console.log("Contenido de los módulos:");
modulos.forEach((info, abreviatura) => {
    console.log(`${abreviatura}: ${info.nombre}, Duración: ${info.duracion}, Alumnos: ${info.numAlumnos}`);
});

// Devuelve las abreviaturas de todos los módulos guardados
const abreviaturas = Array.from(modulos.keys());
console.log("Abreviaturas de los módulos:", abreviaturas.join(", "));

// Devuelve el nombre completo de todos los módulos
const nombresCompleto = Array.from(modulos.values()).map(info => info.nombre);
console.log("Nombres completos de los módulos:", nombresCompleto.join(", "));

// Consulta si está el módulo "DAW"
if (modulos.has("DAW")) {
    console.log("El módulo 'DAW' está almacenado.");
    
    // Si está, elimínalo
    modulos.delete("DAW");
    console.log("El módulo 'DAW' ha sido eliminado.");
} else {
    console.log("El módulo 'DAW' no está almacenado.");
}
