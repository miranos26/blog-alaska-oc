<header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fas fa-folder"> </i> </i> Catégories </h1>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div>
        <a href="index.php?p=admin.categories.index" class="btn btn-dark btn-lg px-3 mt-3"> <i class="fas fa-angle-left mr-3"></i> Retour </a>
    </div>
    <div class="col-md-6 mr-auto ml-auto text-center mt-5">
        <form method="post">
            <?= $form->input('title', 'Titre de la catégorie'); ?>
            <button class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>
</div>
