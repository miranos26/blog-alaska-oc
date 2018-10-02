<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fas fa-cog"> </i> Tableau de bord </h1>
            </div>
        </div>
    </div>
</header>


<?php foreach ($users as $user): ?>

    <?php if($user->id === $_SESSION['auth']){
        $now = new DateTime();
        ?>
    <div class="jumbotron text-center">
    <h1 class="display-4">Bienvenue <?php echo $user->username ?> </h1>
    <p class="lead" id="clock">  </p>
    <hr>
    <p> Selectionnez une action à effectuer </p>
        <!-- ACTIONS -->
        <section id="actions" class="py-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <a href="<?php echo $functions->filePath('admin/articles/creer') ?>" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"> </i> Ajouter un article
                        </a>
                    </div>
                    <div class="col-md-4 mt-3">
                        <a href="<?php echo $functions->filePath('admin/categories') ?>" class="btn btn-success btn-block">
                            <i class="fas fa-plus"> </i> Gérer les catégories
                        </a>
                    </div>
                    <div class="col-md-4 mt-3">
                        <a href="<?php echo $functions->filePath('admin/commentaires') ?>" class="btn btn-warning btn-block text-white">
                            <i class="fas fa-plus"> </i> Gérer les commentaires
                        </a>
                    </div>
                    <div class="col-md-4 mt-3 ml-auto">
                        <a href="<?php echo $functions->filePath('admin/messages') ?>" class="btn btn-secondary btn-block text-white">
                            <i class="fas fa-plus"> </i> Voir vos messages reçus
                        </a>
                    </div>
                    <div class="col-md-4 mt-3 mr-auto">
                        <a href="<?php echo $functions->filePath('admin/newsletter') ?>" class="btn btn-danger btn-block text-white">
                            <i class="fas fa-plus"> </i> Inscriptions Newsletter
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php } endforeach; ?>

<!-- POSTS -->

<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4> Administrer les articles </h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th> Titre </th>
                            <th> Catégories</th>
                            <th> Date</th>
                            <th>  </th>
                            <th>  </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($posts as $post): ?>

                        <tr>
                            <td> <?= $post->id; ?>  </td>
                            <td> <?= $post->title; ?> </td>
                            <td> <?= $post->categorie ?> </td>
                            <td> <?= $functions->dateConvert($post->date)?> </td>
                            <td> <a class="btn btn-secondary" href="<?php echo $functions->filePath('admin/article/editer/' . $post->id )?> "> <i class="fas fa-angle-double-right"></i> Editer </a> </td>
                            <!-- L'utilisation d'un formulaire empeche le cross scripting, voir pour l'utilisation de token CSRS pour vraiment blinder la faille de sécurité -->
                            <td>
                                <form action="<?php echo $functions->filePath('admin/article/supprimer/' . $post->id )?>" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $post->id ?>">
                                    <input type="hidden" name="tokenDelArt" value="<?= $tokenDelArt ?>">
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-times"></i> Supprimer </button>
                            </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Cards count -->
            <div class="col-md-3 mb-5">
                <div class="card text-center bg-primary text-white mb-3">
                    <div class="card-body">
                        <a href="<?php echo $functions->filePath('admin/articles/creer') ?>" class="card_link">
                        <h3 class="text-white"> Articles </h3>
                        <h4 class="display-4 text-white"> <i class="fas fa-pencil-alt"> </i> <?php echo count($posts) ?> </h4>
                        </a>
                    </div>
                </div>
                <div class="card text-center bg-success text-white mb-3">
                    <div class="card-body">
                        <a href="<?php echo $functions->filePath('admin/categories') ?>" class="card_link">
                        <h3 class="text-white"> Catégories </h3>
                        <h4 class="display-4 text-white"> <i class="fas fa-folder"> </i> <?php echo count($categories) ?>  </h4>
                        </a>
                    </div>
                </div>
                <div class="card text-center bg-warning text-white mb-3">
                    <div class="card-body">
                        <a href="<?php echo $functions->filePath('admin/commentaires') ?>" class="card_link">
                        <h3 class="text-white"> Commentaires </h3>
                        <h4 class="display-4 text-white"> <i class="fas fa-comments"></i> <?php echo count($comments) ?> </h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

