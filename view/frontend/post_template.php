<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?=$title?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<!--         <link href="./public/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="./public/css/style.css" rel="stylesheet" />


    </head>

    <header>
        <span><img src="./public/img/logo.png" alt="logo"/></span>
        <h1>Jean Forteroche</h1>
            <nav>
                <a href="./index.php">Accueil</a>
         
                <a href="./index.php?action=authentification">S'identifier</a>

            </nav>
            <h1 id="subtitle">Billets simple pour l'Alaska   <i class="fas fa-pencil-alt"></i></h1>

    </header>

    <body>

        <?= $content ?>

    <script src="./public/js/apps.js"></script>

    </body>
</html>