<?php
function print_head() {
    echo "<head>";

    echo "<link rel='stylesheet' href='../main.css'>";
    echo "<link rel='stylesheet' href='scripts.css'>";

    echo "</head>";

}

function print_header() {

    echo "<div id='background'></div>";

    echo "<header>";
    echo "<div>";
    echo "<img src='https://dvix.es/sources/Dvix%20verde.png' id='logo'>";
    echo "<hr>";
    echo "<h1>AF 15.1</h1>";
    echo "</div>";
    echo "</header>";
}

function make_HTML_table($bdd_table) {
    echo "<table border='1'><tr><th>Código Planta</th><th>Nombre</th><th>Fecha Plantación</th><th>Cantidad</th></tr>";
    foreach ($bdd_table as $row) {
        echo "<tr>
            <td>".$row['codplanta']."</td>
            <td>".($row['nombre'] ?? "<span style='color:blue;'>NULL</span>")."</td>
            <td>".($row['f_plantacion'] ?? "<span style='color:blue;'>NULL</span>")."</td>
            <td>".($row['n_ejemplares'] ?? "<span style='color:blue;'>NULL</span>")."</td>
        </tr>";
    }
    echo "</table>";
}