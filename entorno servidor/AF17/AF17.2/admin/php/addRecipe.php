<?php
// Importación de funciones
include '../../php/globalFunc.php';

// Conectar a la base de datos
$bdd_cocina = bdd_connect();

// Recoger datos del formulario
$name = trim(htmlspecialchars($_POST['recipeName']));
$description = htmlspecialchars($_POST['recipeDescription']);
$time = htmlspecialchars($_POST['recipeTime']);

    // Categorias
if (isset($_POST['recipeCategory'])){
    $categories = $_POST['recipeCategory'];
}
print("<pre>");
print_r($categories);
print("</pre>");

    // Miniatura
if (!file_exists('../../images')){
    mkdir('../../images');
}
$thumbnail = $_FILES['recipeThumbnail'];
$thumbnailName = $thumbnail['name'];
$thumbnailTemp = $thumbnail['tmp_name'];
$thumbnailPath = "./images/" . str_replace(" ", "_", basename($thumbnailName));
$thumbnailDest = "../../images/" . str_replace(" ", "_", basename($thumbnailName));

    // PDF
if (!file_exists('../../pdfs')){
    mkdir('../../pdfs');
}
$pdf = $_FILES['recipeInstructions'];
$pdfName = $pdf['name'];
$pdfTemp = $pdf['tmp_name'];
$pdfPath = "./pdfs/" . basename($pdfName);
$pdfDest = "../../pdfs/" . basename($pdfName);

if (!move_uploaded_file($thumbnailTemp, $thumbnailDest)) {
    echo "Error al cargar la imagen.";
    exit;
}

if (!move_uploaded_file($pdfTemp, $pdfDest)) {
    echo "Error al cargar el archivo PDF.";
    exit;
}

// Añadir receta a la base de datos
$query = "INSERT INTO recetas (nombre, descripcion, foto, documento_pdf, tiempo) VALUES (:nombre, :descripcion, :foto, :documento_pdf, :tiempo)";
$stmt = $bdd_cocina->prepare($query);
$stmt->bindParam(':nombre', $name);
$stmt->bindParam(':descripcion', $description);
$stmt->bindParam(':foto', $thumbnailPath);
$stmt->bindParam(':documento_pdf', $pdfPath);
$stmt->bindParam(':tiempo', $time);
$stmt->execute();

// Asociar las categorias a las recetas en la tabla intermedia
$id = $bdd_cocina->lastInsertId();
$query = "INSERT INTO recetas_categorias (Cod_receta, Cod_categoria) VALUES (:Cod_receta, :Cod_categoria)";
$stmt = $bdd_cocina->prepare($query);
$stmt->bindParam(':Cod_receta', $id);
foreach ($categories as $category) {
    intval($category);
    $stmt->bindParam(':Cod_categoria', $category);
    $stmt->execute();
}

header("Location: ../index.php?edit=recipes");
exit;