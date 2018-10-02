<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo $functions->filePath('css/style.css') ?>"/>
    <link rel="stylesheet" href="<?php echo $functions->filePath('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <title><?= App::getInstance()->title; ?> </title>

</head>

<body id="home" data-spy="scroll" data-target="#main-nav">
    <header>
        <nav class="navbar navbar-expand-sm navbar-light py-3" id="main-nav">
            <div class="container">
                <a class="navbar-brand" href="<?php echo $functions->filePath('') ?> ">
                    <img src="<?php echo $functions->filePath('img/logo.jpg') ?>" width="80" height="67" alt="Jean Forteroche">
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo $functions->filePath('') ?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $functions->filePath('#livre') ?>">Le livre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $functions->filePath('#equipe') ?> ">Equipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $functions->filePath('#contact') ?>">Contact</a>
                        </li>

                        <?php if(isset($_SESSION['auth'])){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $functions->filePath('admin') ?>"> <i class=" p-2 rounded bg-danger text-white fas fa-user"></i> </a> </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php
    $app = App::getInstance();
    $auth = new Core\Auth\DBAuth($app->getDb());

    ?>

    <!-- LOGIN MODAL -->
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Connexion</h5>
                    <button type = "button" class="close" data-dismiss="modal" id="modal-button-login">&times;</button>
                </div>

                <form id = "connexion" method="POST">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Pseudo</label>
                            <input type="text" placeholder="Username" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de Passe </label>
                            <input type="password" placeholder="Password" class="form-control" name="password" id="password">
                            <p class="bg-danger text-white mt-2 rounded px-2 text-center d-none" id="empty-fields"> Veuillez compléter tous les champs du formulaire </p>
                            <div class="bg-danger text-white p-2 rounded bounce-animated d-none" id="login-fail"> Identifiants incorrects </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <div class="g-recaptcha" data-sitekey="6LfsEXMUAAAAAPIZG_CVhCtxEtd4wegw4h7cmGTQ"></div>
                            <input type="submit" value="Connexion" class="btn btn-primary">
                        </div>
                     </div>
                </form>

            </div>
        </div>
    </div>


    <?= $content; ?>

    <!-- FOOTER -->
    <footer id="main-footer" class="py-4 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy; <span id="year"></span> - Jean Forteroche
                    </p>

                    <button id="button-login-modal" data-toggle="modal" data-target="#loginModal">Connexion </button>

                </div>
            </div>
        </div>
    </footer>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

    <script src="<?php echo $functions->filePath('js/homeFunctions.js'); ?>"> </script>

    </body>

</html>
