<h1> Administrer les catégories </h1>

<p>
    <a href="?p=admin.categories.add" class="btn btn-success"> Ajouter </a>
</p>

<table class = "table">
    <thead>
    <tr>
        <td> ID </td>
        <td> Titre </td>
        <td> Actions </td>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($items as $category): ?>
    <tr>
        <td> <?= $category->id; ?> </td>
        <td> <?= $category->title; ?> </td>
        <td>
            <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id; ?> "> Editer </a>

            <!-- L'utilisation d'un formulaire empeche le cross scripting, voir pour l'utilisation de token CSRS pour vraiment blinder la faille de sécurité -->
            <form action="?p=admin.categories.delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $category->id ?>">
                <button type="submit" class="btn btn-danger"> Supprimer </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>

    </tbody>
</table>


<a class="btn btn-primary" href="index.php?p=admin.posts.index"> Administration des articles </a>
