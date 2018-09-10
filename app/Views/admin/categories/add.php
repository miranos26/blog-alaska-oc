<?php

$table = App::getInstance()->getTable('Category');

if(!empty($_POST)){
    $result = $postTable->create([
        'title' => $_POST['title'],
    ]);

    if($result){ // Si la sauvegarde c'est bien passé
       header('Location: admin.php?p=categories.index&id=');
    }
}

$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>

    <button class="btn btn-primary"> Sauvegarder </button>
</form>