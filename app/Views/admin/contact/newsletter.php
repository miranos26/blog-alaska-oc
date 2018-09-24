<header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="far fa-newspaper"></i> Inscription à la Newsletter </h1>
            </div>
        </div>
    </div>
</header>


<section id="categories">
    <div class="container">
        <div>
            <a href="index.php?p=admin.posts.index" class="btn btn-dark btn-lg px-3 mt-3"> <i class="fas fa-angle-left mr-3"></i> Retour </a>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-around">
                        <div> <h4> Liste des inscriptions </h4> </div>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th> ID </th>
                            <th> Nom </th>
                            <th> Email </th>
                            <th> Date d'inscription </th>
                            <th>  </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($subscription as $entry): ?>
                            <tr>
                                <td> <?= $entry->id; ?> </td>
                                <td> <?= $entry->name; ?> </td>
                                <td> <?= $entry->email; ?> </td>
                                <td> <?= $entry->suscribe_date; ?> </td>
                                <td>
                                    <form action="?p=admin.contact.newsletterDeleteEntry&id=<?= $entry->id; ?>" method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $entry->id ?>">
                                        <button type="submit" class="btn btn-danger"> <i class="fas fa-times"></i> Supprimer </button>
                                    </form>
                                </td>
                            </tr>
                        <?php  endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>









