<h1> Administrer les articles </h1>

<p>
    <a href="?p=posts.add" class="btn btn-success"> Ajouter </a>
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
    <?php foreach ($posts as $post): ?>
    <tr>
        <td> <?= $post->id; ?> </td>
        <td> <?= $post->title; ?> </td>
        <td>
            <a class="btn btn-primary" href="?p=posts.edit&id=<?= $post->id; ?> "> Editer </a>

            <!-- L'utilisation d'un formulaire empeche le cross scripting, voir pour l'utilisation de token CSRS pour vraiment blinder la faille de sécurité -->
            <form action="?p=posts.delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $post->id ?>">
                <button type="submit" class="btn btn-danger" href="?p=posts.delete&id=<?= $post->id; ?>"> Supprimer </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>

    </tbody>
</table>


<a class="btn btn-primary" href="?p=categories.index"> Administrer les catégories </a>
