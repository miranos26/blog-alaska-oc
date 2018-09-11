
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title; ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">


    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=j2vmqsr7sxig4janv8sevdfu6gjr8x1qs7m12jeho8g939tv"></script>
    <script>tinymce.init({
            selector:'.wysiwyg',
    });
    </script>


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Project name</a>
        </div>
    </div>
</nav>


<div class="container">

    <div class="starter-template" style="padding-top: 100px;">

        <?= $content; ?>
    </div>

</div><!-- /.container -->

<footer

<div class="footer">
    <a href="index.php?p=users.login">Retour</a>
</div>
</footer>

</body>

</html>
