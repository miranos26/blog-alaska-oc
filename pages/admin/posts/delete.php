<?php

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)){
    $result = $postTable->delete($_POST['id']);

    if($result){ // Si la sauvegarde c'est bien passé
        header('Location: admin.php');
    }
}