const modulos = new Map();

modulos.set("DWECL", "Desarrollo Web en Entorno Cliente");
modulos.set("DAW", "Desarrollo de Aplicaciones Web");
modulos.set("DI", "Diseño de Interfaces");

// Muestra cuántos módulos hay almacenados
console.log(`Número de módulos almacenados: ${modulos.size}`);

// Muestra el contenido de la estructura
console.log("Contenido de los módulos:");
modulos.forEach((nombreCompleto, abreviatura) => {
    console.log(`${abreviatura}: ${nombreCompleto}`);
});

// Devuelve las abreviaturas de todos los módulos guardados
const abreviaturas = Array.from(modulos.keys());
console.log("Abreviaturas de los módulos:", abreviaturas.join(", "));

// Devuelve el nombre completo de todos los módulos
const nombresCompleto = Array.from(modulos.values());
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
