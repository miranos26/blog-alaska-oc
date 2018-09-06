<?php

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)){
    $result = $postTable->update($_GET['id'], [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id']
    ]);

    if($result){ // Si la sauvegarde c'est bien passé
        ?>
        <div class="alert alert-success"> L'article a bien été modifié</div>
        <?php
    }
}

$post = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'title');
$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>

    <button class="btn btn-primary"> Sauvegarder </button>
</form>