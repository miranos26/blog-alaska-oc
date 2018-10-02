<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fas fa-pencil-alt"> </i> Articles </h1>
            </div>
        </div>
    </div>
</header>


<section id="post-edit">
    <div class="container">
        <div>
            <a href="<?php echo $functions->filePath('admin') ?>" class="btn btn-dark btn-lg px-3 mt-3"> <i class="fas fa-angle-left mr-3"></i> Retour </a>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                <div> <h3 class="text-center display-4"> Créer / Modifier un article </h3> </div>
            </div>
        </div>


        <form method="post" enctype="multipart/form-data" class="mb-5">

            <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>

            <?= $form->input('title', 'Titre de l\'article'); ?>
            <?= $form->input('image', 'Image à la une', ['type' => 'file']); ?>
            <?= $form->select('category_id', 'Catégorie', $categories); ?>
            <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>

            <button class="btn btn-primary"> Sauvegarder </button>
        </form>
    </div>
</section>


