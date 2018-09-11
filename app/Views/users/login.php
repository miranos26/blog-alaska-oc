<?php

$app = App::getInstance();
$auth = new Core\Auth\DBAuth($app->getDb());

if($auth->logged()) {
    header('Location: index.php?p=admin.posts.index');
}



?>



<?php if($errors): ?>

    <div class="alert alert-danger">
        Identifiants incorrects
    </div>

<?php endif; ?>


<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>

   <button class="btn btn-primary"> Envoyer </button>
</form>