<?php

use App\App;
use App\Table\Categorie;
use App\Table\Article;

// Execute la methode prepare sur l'obj Database
$post = Article::find($_GET['id']);
if($post === false){
    App::notFound();
}
App::setTitle($post->title . ' | Jean Forteroche');

?>

<h1> <?= $post->title; ?> </h1>

<p> <em> <?= $post->categorie; ?> </em></p>

<p> <?= $post->content; ?> </p>
