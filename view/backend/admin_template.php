
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href=" .\public\css\style.css" rel="stylesheet" />
        <link href=".\public\css\style_admin.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=2xhrg04m9jrcix6tap4wkvmv0od7b6n9lsaypk1zi2ylkvfi"></script>
        <script>tinymce.init({  mode : "specific_textareas",
                                editor_selector : "mceEditor",
                                language_url : './model/tinymce/langs/fr_FR.js',
                                plugins: "image",
                                image_title: true,
                                width : "1000",
                                height:"400",
                                toolbar1: 'undo redo | styleselect | bold italic | link image | ' , 
                                toolbar2: 'alignleft aligncenter alignright'
                                   });</script>

   	    

    </head>

    <header>
        <span><img src="./public/img/logo.png" alt="logo"/></span>
        <h1>Administration</h1>
            <nav>
                <a href="./index.php">Retour au site</a>
                <a href="./controller/logout.php">Se déconnecter</a>

            </nav>

    </header>

    
    <body>
        
        
     
           <div id="tools">
                <nav>
                    <ul>
                        <li> <a href=".\admin_index.php?action=create">Nouvel article</a></li>
                        
                        <li>  <a href=".\admin_index.php?action=default">Liste des articles</a></li>

                      
                        <li>  <a href=".\admin_index.php?action=delete">Supprimer</a></li>


                        
                
                    </ul>
               
                </nav>
           </div>
            <section id="visuel">
                <?= $admin_content; ?>
            </section>
        
      
<script src="./public/js/apps.js"></script>
        
</body>
    

</html>