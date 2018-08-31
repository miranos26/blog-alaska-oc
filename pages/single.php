<?php

// Execute la methode prepare sur l'obj Database
$post = $db->prepare('SELECT * FROM posts WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);

?>


<h1> <?= $post-> title; ?> </h1>

<p> <?= $post->content; ?> </p>
