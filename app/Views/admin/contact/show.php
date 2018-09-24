<header id="main-header" class="py-2 bg-secondary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> <i class="fas fa-envelope-open"></i>  Message </h1>
            </div>
        </div>
    </div>
</header>



<section id="post-edit">
    <div class="container">
        <div>
            <a href="index.php?p=admin.contact.index" class="btn btn-dark btn-lg px-3 mt-3"> <i class="fas fa-angle-left mr-3"></i> Retour </a>
        </div>

        <div class="row mt-5 bg-light">
            <div class="col-md-12 mb-5">
                <div> <h2 class="text-center mt-4"> Message de la part de <strong> <?php echo $message->name ?> </strong> </h2> </div>
                <div> <p class="text-secondary h6 font-italic text-center">  reçu le <?php echo $message->date ?> </p> </div>
                <hr class="mt-5 col-sm-6">
                <div class="text-center">
                    <p class="h5 mt-5 mb-5"> <?php echo $message->message ?> </p>
                </div>
                <hr class="col-sm-6">
                <div class="text-center mt-5"> <p class="h5"> Adresse de contact : <a href="mailto:<?php echo $message->email ?> " class="text-primary"> <?php echo $message->email ?> </a> </p></div>
            </div>
        </div>
    </div>
</section>
