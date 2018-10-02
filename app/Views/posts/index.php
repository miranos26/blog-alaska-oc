<?php

$app = App::getInstance();
$auth = new Core\Auth\DBAuth($app->getDb());

?>

<!-- SHOWCASE -->

<section id="showcase" class="py-5">
    <div class="primary-overlay text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center">
                    <h1 class="display-2 mt-5 pt-5">
                        Billet Simple pour l'Alaska
                    </h1>
                    <p class="lead"> Partez pour le Grand Nord en découvrant ce roman </p>
                    <a href="articles/liste" class="btn btn-outline-danger btn-lg text-white"> <i class="fas fa-arrow-right"> </i>  Lire le livre
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="img/book.png" alt="Billet Simple pour l'Alaska" class="img-fluid d-none d-lg-block">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEWSLETTER -->
<section id="newsletter" class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-4 text-center"> Inscrivez-vous à la newsletter pour recevoir les derniers chapitres en exclusivité ! </h3>
            </div>
        </div>

        <form id="newsletter-form">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="newsletter-name" class="form-control form-control-lg mb-resp" placeholder="Nom" id="newsletter-name">
                </div>
                <div class="col-md-4">
                    <input type="email" name= "newsletter-email" class="form-control form-control-lg mb-resp" placeholder="Email" id="newsletter-email">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-envelope-open-o"></i> S'inscrire
                    </button>
                </div>
            </div>
        </form>

        <div class="bg-danger mt-3 text-center rounded d-none" id="news-failed">
            <p> Merci de bien vouloir renseigner tous les champs</p>
        </div>
        <div class="bg-success mt-3 text-center rounded d-none" id="news-success">
            <p> Votre inscription a bien été prise en compte </p>
        </div>


</section>

<!-- ABOUT / WHY SECTION -->
<section id="about" class="py-5 text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="info-header mb-5">
                    <h1 class="text-primary pb-3"> Pourquoi lire ce livre ? </h1>
                    <p class="lead pb-3">
                        C'est autant dans l'Alaska réel que dans un monde d'images que nous entraîne Jean Forteroche : un voyage qui nous fait rêver d'huile de phoque, de soupe de chouette, de steaks de caribou, de grizzlis dans la toundra cueillant des baies sauvages.S'embarquer avec J.Forteroche, c'est descendre en canoë et en kayak l'ultime rivière arctique, dans les Western Brooks Ranges, au-delà des derniers arbres, au royaume des grizzlis et des saumons, explorer l'arrière-pays avec d'étranges compagnons, pénétrer dans le bush, vivre tout au long du voyage avec le sentiment profond du silence, du froid, de l'espace immense, et rencontrer pourtant une foule extraordinaire de personnages hors du temps.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- BLOG SECTION -->
<section id="livre" class="py-3">
    <div class="container">
        <h1 class="text-primary pb-3 text-center mb-5 mt-3"> Les derniers chapitres </h1>
        <div class="row">
                <div class="card-deck">
                <?php foreach($posts as $post): ?>
                    <div class="col-md-4 cards-home mb-4">
                        <div class="card">
                            <img src="<?= $post->featured_image?>" alt="" class="img-fluid card-img-top">
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

        <div class="type-1 mx-auto mb-5 mt-4">
            <div>
                <a href="articles/liste" class=" btn btn-1">
                    <span class="txt">Voir tous les chapitres</span>
                    <span class="round"><i class="fa fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- AUTHORS -->
<section id="equipe" class="my-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="info-header mb-5">
                    <h1 class="text-primary pb-3">
                        Rencontrez l'équipe
                    </h1>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis nibh a nisl tempus vestibulum.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Productrice -->
            <div class="col-lg-4 col-md6">
                <div class="card">
                    <div class="card-body">
                        <img src="img/person1.jpg" class="img-fluid rounded-circle w-50 mb-3" alt="Suzan Williams">
                        <h3> Sandrine Astier </h3>
                        <h5 class="text-muted"> Editrice </h5>
                        <p> Vestibulum gravida interdum dolor, at blandit risus congue id. Ut nec euismod risus. In rutrum egestas lacinia. Aliquam at nisi nec enim tristique varius vitae id mauris.</p>
                        <div class="d-flex justify-content-center">
                            <div class="p-4">
                                <a href="http://facebook.com">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="http://twitter.com">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="http://instagram.com">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md6 mt-resp-4">
                <div class="card">
                    <div class="card-body">
                        <img src="img/person2.jpg" class="img-fluid rounded-circle w-50 mb-3" alt="Suzan Williams">
                        <h3> Jean Forteroche </h3>
                        <h5 class="text-muted"> Romancier </h5>
                        <p> Vestibulum gravida interdum dolor, at blandit risus congue id. Ut nec euismod risus. In rutrum egestas lacinia. Aliquam at nisi nec enim tristique varius vitae id mauris.</p>
                        <div class="d-flex justify-content-center">
                            <div class="p-4">
                                <a href="http://facebook.com">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="http://twitter.com">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="http://instagram.com">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md6 mt-resp-4">
                <div class="card">
                    <div class="card-body">
                        <img src="img/person3.jpg" class="img-fluid rounded-circle w-50 mb-3" alt="Suzan Williams">
                        <h3> Cindy Dubois</h3>
                        <h5 class="text-muted"> Community Manager </h5>
                        <p> Vestibulum gravida interdum dolor, at blandit risus congue id. Ut nec euismod risus. In rutrum egestas lacinia. Aliquam at nisi nec enim tristique varius vitae id mauris.</p>
                        <div class="d-flex justify-content-center">
                            <div class="p-4">
                                <a href="http://facebook.com">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="http://twitter.com">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                            <div class="p-4">
                                <a href="http://instagram.com">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- PARALLAX HEADING SECTION -->
<section id="home-heading" class="p-5">
    <div class="dark-overlay">
        <div class="row">
            <div class="col">
                <div class="container pt-5">
                    <h1>  « La vie des écrivains s'éclaire surtout par leurs ouvrages.» </h1>
                    <p class="d-none d-md-block author-name"> <em> Jean Forteroche </em> </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- CONTACT -->
<section id="contact" class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h3> Contactez-nous </h3>
                <p class="lead"> Praesent posuere nunc justo, eget suscipit nunc tincidunt sed </p>
                <form method="post" id="contactForm">
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"> </i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nom" id="name">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"> </i>
                            </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" id="email">
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-pencil-alt"> </i>
                            </span>
                        </div>
                        <textarea placeholder="Message" class="form-control" rows="5" id="message"></textarea>
                    </div>

                    <input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg">
                    <div class="bg-success mt-3 text-white rounded text-center d-none" id="message-send"> <p> Message envoyé </p></div>
                    <div class="bg-danger mt-3 text-white rounded text-center d-none" id="message-failed"> <p> Echec de l'envoi du message </p></div>
                    <div class="bg-danger mt-3 text-white rounded text-center d-none" id="field-empty"> <p> Merci de remplir tous les champs </p></div>
                </form>
            </div>

            <div class="col-lg-3 align-self-center mt-4">
                <img src="img/logo.jpg" alt="Jean Forteroche logo" class="img-fluid">
            </div>
        </div>
    </div>
</section>









