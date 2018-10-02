<header id="main-header" class="py-2 bg-secondary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fas fa-envelope"></i> Vos messages reçus </h1>
            </div>
        </div>
    </div>
</header>



<section id="comments">
    <div class="container">
        <div>
            <a href="<?php echo $functions->filePath('admin') ?>" class="btn btn-dark btn-lg px-3 mt-3 text-white"> <i class="fas fa-angle-left mr-3"></i> Retour </a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Messages via le formulaire de contact </h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th> Pseudo </th>
                            <th> Message </th>
                            <th> Email </th>
                            <th> Date </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (array_reverse($messages) as $message): ?>

                                <tr>
                                    <td> <?= $message->name; ?> </td>
                                    <td> <?= $message->excerpt; ?> </td>
                                    <td> <?= $message->email; ?> </td>
                                    <td> <?= $functions->dateConvertWithTime($message->date)?> </td>
                                    <td> <a class="btn btn-secondary" href="<?php echo $functions->filePath('admin/messages/' . $message->id ) ?> "> <i class="fas fa-angle-double-right"></i> Voir </a> </td>
                                    <!-- L'utilisation d'un formulaire empeche le cross scripting, voir pour l'utilisation de token CSRS pour vraiment blinder la faille de sécurité -->
                                    <td>
                                        <form action="<?php echo $functions->filePath('admin/messages/supprimer/' . $message->id ) ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $message->id ?>">
                                            <input type="hidden" name="tokenDelMessage" value="<?= $tokenDelMessage ?>">
                                            <button type="submit" class="btn btn-danger"> <i class="fas fa-times"></i> Supprimer </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>