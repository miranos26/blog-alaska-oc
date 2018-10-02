
<!-- PAGE HEADER -->

<header id="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto text-center">
                <h1> <?= $article->title; ?> </h1>
                <p> <?= $article->categorie; ?> </p>
            </div>
        </div>
    </div>
</header>


<section id="chapitres" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <?= $article->title; ?> </h1>
                <p> <em> <?= str_replace('s', '', $article->categorie) . ' ' . $article->id . " publié le " .  $functions->dateConvert($article->date) ?> </em> </p>
                <p> <?= $article->content; ?> </p>
            </div>
            <div class="col-md-6">
                <img src="<?php echo $functions->filePath($article->featured_image) ?>" class="img-fluid rounded-circle d-none d-md-block chapitres-img">
            </div>
        </div>
    </div>
</section>


<!-- COMMENTS -->
<section id="comments" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-4">
                <div class="card p-4">
                    <div class="card-body" id="blockComments">
                        <h4> Commentaires </h4>
                        <div id="comment-item">
                        </div>
                            <div>
                            <?php foreach($comments as $comment):

                                if ($comment->post_id === $article->id) {?>
                                    <h5 class="mb-0"> <?= $comment->pseudo ?> </h5>
                                    <p class="mb-0"> <?= $comment->content;?> </p>
                                <div class="flex">
                                    <p> <em class="italic mb-0"> <?php $functions->dateDiff($comment->date_comment); ?> </em> </p>

                                    <form class="signaler" method="post">
                                        <input type="hidden" name="comment_id" value="<?= $comment->id ?> ">
                                        <input type="submit" value="Signaler" class="report-comment" name="report-comment" data-toggle="modal" data-target="#myModal">
                                    </form>
                                </div>

                            <?php } endforeach; ?>
                            </div>
                        <!-- MODAL -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> Commentaire signalé </h5>
                                        <button class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        L'administrateur du site a bien été informé de votre signalement. Merci pour votre aide.
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="text-center"> Remplissez ce formulaire pour laisser votre commentaire</h3>
                        <hr>
                        <form id="commentForm">
                            <input name="post_id" id="post_id" type="hidden" value="<?= $article->id ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name ="pseudo" id="pseudo" type="text" class="form-control" placeholder="Pseudo">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="commentMessage" id="commentMessage" class="form-control" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-outline-danger btn-block">
                                    </div>
                                    <div class="col-md-12 alert alert-danger text-center d-none" id="comment-failed">
                                        Erreur : Veuillez renseigner tous les champs svp
                                    </div>
                                    <div class="col-md-12 alert alert-success text-center d-none" id="comment-success">
                                        Votre commentaire a bien été posté.
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- TESTIMONIALS -->
<section id="testimonials" class="p-4 bg-dark text-white">
    <div class="container">
        <h2 class="text-center"> Critiques de Presse </h2>
        <div class="row text-center">
            <div class="col">
                <div class="slider">
                    <div>
                        <blockquote class="blockquote">
                            <p class="mb-0">
                                Cette magistrale saga est le récit d’une formidable aventure intellectuelle. Alors, comme au terme de toute saga, on aimerait qu’il y ait une suite.
                            </p>
                            <footer class="blockquote-footer"> Telerama </footer>
                        </blockquote>
                    </div>
                    <div>
                        <blockquote class="blockquote">
                            <p class="mb-0">
                                Jean Forteroche confronte bêtes et hommes dans un roman au souffle puissant. Captivant !
                            </p>
                            <footer class="blockquote-footer"> Libération </footer>
                        </blockquote>
                    </div>
                    <div>
                        <blockquote class="blockquote">
                            <p class="mb-0">
                                A la fois conte et roman contemporain, réflexion sur le progrès et les vieilles légendes, Billet Simple pour l'Alaska n’est pas un livre qu’on apprivoise du premier coup d’œil.
                            </p>
                            <footer class="blockquote-footer"> Le Monde </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


