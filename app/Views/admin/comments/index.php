<header id="main-header" class="py-2 bg-warning text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fas fa-comments"></i> </i> Commentaires </h1>
            </div>
        </div>
    </div>
</header>



<section id="comments">
    <div class="container">
        <div>
            <a href="index.php?p=admin.posts.index" class="btn btn-dark btn-lg px-3 mt-3 text-white"> <i class="fas fa-angle-left mr-3"></i> Retour </a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Administrer les commentaires signalés </h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th> Pseudo </th>
                            <th> Message </th>
                            <th> Date </th>
                            <th> Statut </th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (array_reverse($comments) as $comment): ?>

                        <?php $dateConverter = new viewFunction();

                            $reported = $comment->reported;

                            if($reported === '1'){
                                $reported = '<i class="fas fa-exclamation-triangle text-danger pl-3"></i>' ?>
                        <tr>
                            <td> <?= $comment->pseudo; ?> </td>
                            <td> <?= $comment->content; ?> </td>
                            <td> <?= $dateConverter->dateConvert($comment->date_comment)?> </td>
                            <td> <?= $reported; ?> </td>
                            <!-- L'utilisation d'un formulaire empeche le cross scripting, voir pour l'utilisation de token CSRS pour vraiment blinder la faille de sécurité -->
                            <td>
                                <form action="?p=admin.comments.delete&id=<?= $comment->id; ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $comment->id ?>">
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-times"></i> Supprimer </button>
                                </form>
                            </td>
                        </tr>
                        <?php } endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <div class="row mt-5">
        <div class="col-md-12">
        <!-- ACCORDION -->
            <div id="accordion">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4> <a href="#collapse1" data-parent="#accordion" data-toggle="collapse" class="text-white"> Tous les commentaires </a> </h4>
                    </div>
                        <div id="collapse1" class="collapse show">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th> Pseudo </th>
                                        <th> Message </th>
                                        <th> Date </th>
                                        <th> Statut </th>
                                        <th> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach (array_reverse($comments) as $comment): ?>

                                        <?php $dateConverter = new viewFunction();

                                        $reported = $comment->reported;

                                        if($reported === null){ ?>
                                            <tr>
                                                <td> <?= $comment->pseudo; ?> </td>
                                                <td> <?= $comment->content; ?> </td>
                                                <td> <?= $dateConverter->dateConvert($comment->date_comment)?> </td>
                                                <td> <?= $reported; ?> </td>
                                                <!-- L'utilisation d'un formulaire empeche le cross scripting, voir pour l'utilisation de token CSRS pour vraiment blinder la faille de sécurité -->
                                                <td>
                                                    <form action="?p=admin.comments.delete&id=<?= $comment->id; ?>" method="post" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                                                        <button type="submit" class="btn btn-danger"> <i class="fas fa-times"></i> Supprimer </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>