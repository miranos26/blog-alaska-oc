<header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fas fa-folder"> </i> </i> Catégories </h1>
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
                        <div> <h4> Administrer les catégories </h4> </div>
                        <div> <a href="?p=admin.categories.add" class="btn btn-primary "> Ajouter une catégorie </a> </div>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th> ID </th>
                            <th> Titre </th>
                            <th>  </th>
                            <th>  </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($items as $category): ?>
                            <tr>
                                <td> <?= $category->id; ?> </td>
                                <td> <?= $category->title; ?> </td>
                                <td> <a class="btn btn-secondary" href="?p=admin.categories.edit&id=<?= $category->id; ?> "> Editer </a> </td>
                                <td>
                                    <form action="?p=admin.categories.delete&id=<?= $category->id; ?>" method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $category->id ?>">
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








