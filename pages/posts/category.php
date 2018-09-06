<?php

$app = App::getInstance();


$categorie = $app->getTable('Category')->find($_GET['id']);

if($categorie === false){
    $app->notFound();
}
$articles = $app->getTable('Post')->lastByCategory($_GET['id']);
$categories = $app->getTable('Category')->all();

?>

<h1> <?= $categorie->title ?> </h1>


<div class="row">

    <div class="col-sm-8">

        <?php foreach($articles as $post): ?>

            <h2><a href="<?= $post->url ?>"> <?= $post->title; ?> </a> </h2>

            <p> <em> <?= $post->categorie; ?> </em></p>

            <p> <?= $post->excerpt; ?> </p>

        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">

        <ul>
            <?php foreach($categories as $categorie): ?>
                <li><a href="<?= $categorie->url; ?>" <p> <?= $categorie->title; ?> </p> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>








