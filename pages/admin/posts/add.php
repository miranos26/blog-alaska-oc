<?php

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)){
    $result = $postTable->create([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id']
    ]);

    if($result){ // Si la sauvegarde c'est bien passé
       header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
    }
}

$categories = App::getInstance()->getTable('Category')->extract('id', 'title');
$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>

    <button class="btn btn-primary"> Sauvegarder </button>
</form>