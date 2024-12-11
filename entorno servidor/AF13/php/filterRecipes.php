<?php
$filter = [];
$file = file("../recetas.txt");

if (isset($_POST['nameFilter'])){
    $nameFilter = strtolower(trim($_POST['nameFilter'])) ;
}

if (isset($_POST['filterCategory'])){
    $categoryFilter = $_POST['filterCategory'];
}

if ($file > 0){
    foreach ($file as $line){
        $same = true;
        $id = explode("\t",$line)[0];
        $name = strtolower(explode("\t",$line)[1]) ;
        $categories = explode (", ",explode("\t",$line)[3]);

        if ($nameFilter !== ""){
            if (!str_starts_with($name, $nameFilter)){
                $same = false;
            }
        }

        if (isset($categoryFilter)){
            print('<br>');
            print_r($categoryFilter);
            print('<br>');
            foreach ($categoryFilter as $cat) {
                $var = in_array($cat, $categories);
                if (!$var){
                    print_r($categories);
                    print("<br>");
                    $same = false;
                } else {
                    print_r($categories);
                    print("<br>");
                    print('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
                    print("<br>");
                }
            }
        }

        if ($same){
            array_push($filter, $id);
        }
    }
}

$filterStr = "";
foreach ($filter as $key => $value){
    $filterStr .= $value;
    if ($key != array_key_last($filter)){
        $filterStr .= ",";
    }
}

print('<br>');
print('<br>');
print('Filtro');
print('<br>');
// print_r($categoryFilter);
print_r($cat);
print('<br>');
print($filterStr);

header("Location: ../index.php?filtered=true&filter=$filterStr");
exit;