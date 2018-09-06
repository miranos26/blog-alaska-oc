<?php

$table = App::getInstance()->getTable('Category');

if(!empty($_POST)){
    $result = $table->update($_GET['id'], [
        'title' => $_POST['title']
    ]);

    if($result){ // Si la sauvegarde c'est bien passé
        ?>
        <div class="alert alert-success"> La catégorie a bien été modifiée</div>
        <?php
    }
}

$categorie= $table->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'title');
$form = new \Core\HTML\BootstrapForm($categorie);
?>

<form method="post">
    <?= $form->input('title', 'Titre de la catégorie'); ?>

    <button class="btn btn-primary"> Sauvegarder </button>
</form>