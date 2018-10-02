
<!-- BLOG SECTION -->
<section id="blog" class="py-3">
    <div class="container">
        <h1 class="text-primary pb-3 text-center mb-5 mt-3"> Tous les chapitres </h1>
        <div class="row">
                <div class="card-deck">
                <?php foreach($posts as $post): ?>
                    <div class="col-md-4 cards-home mb-4">
                        <div class="card">
                            <img src=" <?php echo $functions->filePath($post->featured_image) ?>" alt="" class="img-fluid card-img-top">
                            <div class="card-body">
                                <h4 class="card-title"> <a href="<?= $post->url ?>"> <?= $post->title; ?> </a> </h4>
                                <small class="text-muted"> <?=$post->categorie .' ' . $post->id; ?> </small>
                                <hr>
                                <p class="card-text">
                                    <?= $post->excerpt; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
    </div>
</section>

