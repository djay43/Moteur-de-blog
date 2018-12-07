
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>

        <link href=" .\public\css\style.css" rel="stylesheet" />
        <link href=".\public\css\style_admin.css" rel="stylesheet" />

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=2xhrg04m9jrcix6tap4wkvmv0od7b6n9lsaypk1zi2ylkvfi"></script>
        <script>tinymce.init({  selector:'textarea',
                                language_url : './model/tinymce/langs/fr_FR.js',
                                plugins: "image",
                                image_title: true,
                                toolbar1: 'undo redo | styleselect | bold italic | link image | ' , 
                                toolbar2: 'alignleft aligncenter alignright'
                                   });</script>

   	    

    </head>

    <header>
        
        <h1>Interface d'administration</h1>
        <a href="./index.php">Accueil</a>
        <a href="./controller/logout.php">Se déconnecter</a>


        
    </header>
    
    <body>
        
        
       <section id="admin">
          
           <div id="tools">
                <nav>
                    <ul>
                        <li> <a href=".\admin_index.php?action=create">Create</a></li>
                        
                        <li>  <a href=".\admin_index.php?action=read">Read</a></li>
                        
                        <li>  <a href=".\admin_index.php?action=update">Update</a></li>
                        
                        <li>  <a href=".\admin_index.php?action=delete">Delete</a></li>

                        <li>  <a href=".\admin_index.php?action=default">Default</a></li>

                        
                
                    </ul>
               
                </nav>
           </div>
           
            <div id="visuel">
                <?= $admin_content; ?>
                
           </div>
        
        </section>
      
           
          
</body>
    
<footer>
    
</footer>
</html>