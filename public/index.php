<?php

require '../app/Autoloader.php';

App\Autoloader::register();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

// Initialisation des objets
$db = new App\Database('blog');

// Tout ce qui va etre affiché sera stocké dans une variable : utilisé pour notre template
ob_start();
if($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'article') {
    require '../pages/single.php';
}elseif ($p === 'categorie') {
    require '../pages/categorie.php';
}

$content = ob_get_clean();

// La variable content va valoir le contenu de $content dans le template
require '../pages/templates/default.php';