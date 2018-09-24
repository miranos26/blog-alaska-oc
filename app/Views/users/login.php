<?php

$app = App::getInstance();
$auth = new Core\Auth\DBAuth($app->getDb());

header('Location: index.php?p=admin.posts.index');

//if($auth->logged()) {
 //   header('Location: index.php?p=admin.posts.index');
//}

var_dump($_POST);

echo $logs;


?>



<?php if($errors): ?>

    <div class="alert alert-danger">
        Identifiants incorrects
    </div>

<?php endif; ?>
