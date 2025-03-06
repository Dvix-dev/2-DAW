<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn-icons-png.freepik.com/256/1139/1139048.png?semt=ais_hybrid" type="image/x-icon">
    <title>Panel Administrativo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./admin.css">

</head>

<?php
    include "../php/globalFunc.php";

    $bdd_cocina = bdd_connect();

    $recipes = get_recipes($bdd_cocina);
    $categorias = get_categories($bdd_cocina);
?>

<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <h1>Recetas de Cocina</h1>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../index.php">Recetas</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Admin</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sección principal -->
    <main>
        <div class="main-content">
            <section class="adm-main_menu">
                <h2>Panel Administrativo</h2>
                <div class="buttons-container">
                    <a href="./index.php?edit=recipes"><button class="btn">Editar Recetas</button></a>
                    <a href="./index.php?edit=categories"><button class="btn">Editar Categorias</button></a>
                </div>
            </section>
        </div>
        <?php
            if (isset($_GET['edit'])){
                print ("<hr class='separator'>");
                print ("<section class='crud'>");
                if ($_GET['edit'] == "recipes"){
                    print("<button onclick='openAddRecipeModal()' class='add'>Añadir</button>");
                    if (!empty($recipes)){
                        print ("<table border='2px'><thead><tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Ruta Imagen</th><th>Ruta PDF</th><th>Tiempo</th><th>Categorias</th><th>Editar</th><th>Eliminar</th></tr></thead>");
                        print ("<tbody>");
                        foreach ($recipes as $recipe){
                            // Guardar los datos en variables
                            $ID = $recipe['Cod_receta'];
                            $name = $recipe['nombre'];
                            $description = $recipe['descripcion'];
                            $img_path = $recipe['foto'];
                            $pdf_path = $recipe['documento_pdf'];
                            $time = $recipe['tiempo'];
                            $categories = "";
                            $categories = categorizar($ID);

                            // Imprimir los datos
                            print ('<tr><td>'. $ID .'</td><td>'. $name .'</td><td>'. $description .'</td><td>'. $img_path .'</td><td>'. $pdf_path .'</td><td>'. $time .'</td><td>'. $categories .'</td><td><button>'. edit_icon() .'</button></td><td><a href="php/deleteRecipe.php?id=' . $ID . '"><button>' . delete_icon() .'</button></td></td></tr>');
                        }
                        print ("</tbody></table>");
                    }
                } else if ($_GET['edit'] == "categories"){
                    print("<button onclick='openAddCategoryModal()' class='add'>Añadir</button>");
                    if (!empty($categorias)){
                        print ("<table border='2px'><thead><tr><th>Cod</th><th>Nombre</th><th>Descripción</th><th>Editar</th><th>Eliminar</th></tr></thead>");
                        print ("<tbody>");
                        foreach ($categorias as $categoria){
                            // Guardar los datos en variables
                            $cod = $categoria['Cod_categoria'];
                            $name = $categoria['nombre'];
                            $description = $categoria['descripcion'];

                            // Imprimir los datos
                            print ('<tr><td>'. $cod .'</td><td>'. $name .'</td><td>'. $description .'</td><td><a href="./php/editCategory?cat='. $cod .'"><button>'. edit_icon() .'</button></a></td><td><a href="php/deleteCategory.php?cod=' . $cod . '"><button>' . delete_icon() . '</button></a></td></tr>');
                        }
                        print ("</tbody></table>");
                    }
                }
                print ("</section>");
            }
        ?>
        <!-- Modal para Añadir Receta -->
        <div id="addRecipeModal" class="modal">
            <div class="modal-content">
                <h2>Añadir Nueva Receta</h2>
                <form id="recipeForm" action="./php/addRecipe.php" method="post" enctype="multipart/form-data">
                    <label for="recipeName">Nombre de la receta:</label>
                    <input type="text" id="recipeName" name="recipeName" required>

                    <label for="recipeDescription">Descripción breve:</label>
                    <textarea id="recipeDescription" name="recipeDescription" maxlength="60" required></textarea>

                    <label for="recipeCategory">Tipo(s):</label>
                    <div class="category-container">
                        <?php 
                            foreach ($categorias as $categoria){
                                print('<div class="add_category">');
                                    print('<input type="checkbox" class="recipeCategory" name="recipeCategory[]" value="'. $categoria['Cod_categoria'] .'"><span>'. $categoria['nombre'] .'</span>');
                                print('</div>');
                            } 
                        ?>  
                    </div>

                    <label for="recipeTime">Tiempo de preparación (minutos):</label>
                    <input type="number" id="recipeTime" name="recipeTime" required>

                    <label for="recipeThumbnail">Imagen:</label>
                    <input type="file" accept=".jpg,.png,.jpeg" id="recipeThumbnail" name="recipeThumbnail" required></input>

                    <label for="recipeInstructions">PDF Instrucciones:</label>
                    <input type="file" accept=".pdf" id="recipeInstructions" name="recipeInstructions" required></input>


                    <button type="submit" class="btn">Añadir Receta</button>
                </form>
            </div>
        </div>
        <!-- Modal para Añadir Categoria -->
        <div id="addCategoryModal" class="modal">
            <div class="modal-content">
                <h2>Añadir Nueva Categoria</h2>
                <form id="categoryForm" action="./php/addCategory.php" method="post" enctype="multipart/form-data">
                    <label for="categoryName">Nombre de la categoria:</label>
                    <input type="text" id="categoryName" name="categoryName" required>

                    <label for="categoryDescription">Descripción:</label>
                    <textarea id="categoryDescription" name="categoryDescription" maxlength="60" required></textarea>

                    <button type="submit" class="btn">Añadir Categoria</button>
                </form>
            </div>
        </div>
        <!-- Modal para Editar Categoria -->
        <div id="editCategoryModal" class="modal">
            <div class="modal-content">
                <h2>Añadir Nueva Categoria</h2>
                <form id="categoryForm" action="./php/editCategory.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="">

                    <label for="categoryName">Nombre de la categoria:</label>
                    <input type="text" id="categoryName" name="categoryName" value="<?php $id ?>" required>

                    <label for="categoryDescription">Descripción:</label>
                    <textarea id="categoryDescription" name="categoryDescription" maxlength="60" required></textarea>

                    <button type="submit" class="btn">Añadir Categoria</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Recetas de cocina V2 by Dvix-dev - 2025 </p>
    </footer>
    
    <script src="./script.js"></script>
</body>
</html>