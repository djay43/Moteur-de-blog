
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Jean forteroche administration</title>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=2xhrg04m9jrcix6tap4wkvmv0od7b6n9lsaypk1zi2ylkvfi"></script>
        <script>tinymce.init({  selector:'textarea',
                                language_url : '../../model/tinymce/langs/fr_FR.js',
                                plugins: "image",
                                image_title: true,
                                toolbar1: 'undo redo | styleselect | bold italic | link image | ' , 
                                toolbar2: 'alignleft aligncenter alignright'
                                   });</script>

   	    <link href="../../public/css/style.css" rel="stylesheet" />
        <link href="../../public/css/style_admin.css" rel="stylesheet" />


    </head>

    <header>
        
        <h1>Interface d'administration</h1>
        <a href="../../index.php">Accueil</a>
        <a href="../../controller/logout.php">Se déconnecter</a>


        
    </header>
    
    <body>
        
        
       <section id="admin">
          
           <div id="tools">
                <nav>
                    <ul>
                        <li> <a href="../index.php">Create</a></li>
                        
                        <li>  <a href="#">Read</a></li>
                        
                        <li>  <a href="#">Update</a></li>
                        
                        <li>  <a href="#">Delete</a></li>
                        
                        
                        
                        
                        
                        
                        
                    </ul>
               
                </nav>
           </div>
           
            <div id="visuel">
                <form action="../../controller/back_control.php" method="post"><textarea name="create_post"><br /> </textarea>
                <input name="send" type="submit" value="Envoyer" /></form>
                
           </div>
        
        </section>
      
           
          
</body>
    
<footer>
    
</footer>
</html>