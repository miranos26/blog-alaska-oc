<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo $functions->filePath('css/style.css') ?> " />
    <link rel="stylesheet" href="<?php echo $functions->filePath('css/bootstrap.css') ?> ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title><?= App::getInstance()->title; ?> </title>

</head>

<body id="home" data-spy="scroll" data-target="#main-nav">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
        <div class="container">
            <a href="<?php echo $functions->filePath('') ?>" class="navbar-brand"> Jean Forteroche </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="<?php echo $functions->filePath('admin') ?>" class="nav-link" id="dashboard"> Articles </a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="<?php echo $functions->filePath('admin/categories') ?>" class="nav-link" id="categories"> Categories </a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="<?php echo $functions->filePath('admin/commentaires') ?>" class="nav-link" id="comments"> Commentaires </a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="<?php echo $functions->filePath('admin/messages') ?>" class="nav-link" id="messages"> Messages </a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="<?php echo $functions->filePath('admin/newsletter') ?>" class="nav-link" id="newsletter"> Newsletter </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?php echo $functions->filePath('admin/deconnexion') ?>" class="nav-link" id="deconnexion"> <i class="fas fa-user-times"> </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>


<?= $content; ?>



<!-- FOOTER -->
<footer id="main-footer-admin" class="py-4 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    Copyright &copy; <span id="year"></span> - Jean Forteroche
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=j2vmqsr7sxig4janv8sevdfu6gjr8x1qs7m12jeho8g939tv"></script>

<script>

    tinymce.init({
        selector:'.wysiwyg',
        height: 500,
        theme:'modern',
        menubar: false,
        plugins: "autolink, save, media, fullscreen, template",
        toolbar: 'undo redo | bold italic | link image alignleft aligncenter alignright | styleselect',
        style_formats:[
            {
                title: "Headers",
                items: [
                    {title: "Header 1",format: "h1"},
                    {title: "Header 2",format: "h2"},
                    {title: "Header 3",format: "h3"},
                    {title: "Header 4",format: "h4"},
                    {title: "Header 5",format: "h5"},
                    {title: "Header 6",format: "h6"}
                ]
            },
            {
                title: "Inline",items: [{title: "Bold",icon: "bold",format: "bold"}, {title: "Italic",icon: "italic",format: "italic"},
                    {title: "_Underline",icon: "underline",format: "underline"}, {title: "Strikethrough",icon: "strikethrough",format: "strikethrough"}]},
            {title: "_Blocks",items: [{title: "Paragraph",format: "p"}, {title: "Blockquote",format: "blockquote"}, {title: "Div",format: "div"}, {title: "Pre",format: "pre"}]},
            {title: "_Alignment",items: [{title: "Left",icon: "alignleft",format: "alignleft"}, {title: "Center",icon: "aligncenter",format: "aligncenter"}, {title: "Right",icon: "alignright",format: "alignright"}, {title: "Justify",icon: "alignjustify",format: "alignjustify"}]},
            {
                title: "Font Family",
                items: [
                    {title: 'Arial', inline: 'span', styles: { 'font-family':'arial'}},
                    {title: 'Book Antiqua', inline: 'span', styles: { 'font-family':'book antiqua'}},
                    {title: 'Comic Sans MS', inline: 'span', styles: { 'font-family':'comic sans ms,sans-serif'}},
                    {title: 'Courier New', inline: 'span', styles: { 'font-family':'courier new,courier'}},
                    {title: 'Georgia', inline: 'span', styles: { 'font-family':'georgia,palatino'}},
                    {title: 'Helvetica', inline: 'span', styles: { 'font-family':'helvetica'}},
                    {title: 'Impact', inline: 'span', styles: { 'font-family':'impact,chicago'}},
                    {title: 'Open Sans', inline: 'span', styles: { 'font-family':'Open Sans'}},
                    {title: 'Symbol', inline: 'span', styles: { 'font-family':'symbol'}},
                    {title: 'Tahoma', inline: 'span', styles: { 'font-family':'tahoma'}},
                    {title: 'Terminal', inline: 'span', styles: { 'font-family':'terminal,monaco'}},
                    {title: 'Times New Roman', inline: 'span', styles: { 'font-family':'times new roman,times'}},
                    {title: 'Verdana', inline: 'span', styles: { 'font-family':'Verdana'}}
                ]
            },
            {title: "Font Size", items: [
                    {title: '8pt', inline:'span', styles: { fontSize: '12px', 'font-size': '8px' } },
                    {title: '10pt', inline:'span', styles: { fontSize: '12px', 'font-size': '10px' } },
                    {title: '12pt', inline:'span', styles: { fontSize: '12px', 'font-size': '12px' } },
                    {title: '14pt', inline:'span', styles: { fontSize: '12px', 'font-size': '14px' } },
                    {title: '16pt', inline:'span', styles: { fontSize: '12px', 'font-size': '16px' } }
                ]
            }]
    });

</script>

<script src="<?php echo $functions->filePath('js/adminFunctions.js'); ?>"> </script>

</body>
</html>
