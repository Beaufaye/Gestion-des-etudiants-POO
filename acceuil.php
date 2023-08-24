<?php
    session_start();
    $user = $_SESSION["user"];
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="font/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="font/font-awesome/css/font-awesome.min.css">
        <script type="text/javascript" src="font/js/jquery/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="font/css/style.css">
        <title>Acceuil</title>
    </head>

    <body>

        <div class="container" id="container">
            <div class="container" id="banniere">
                <div class="div-1">
                    <img src="font/images/logo armoirie bf.jpg" alt="logo de gauche" class="logo">
                </div>
                <div class="welcom">
                    <p>Université Thomas SANKARA</p>
                </div>

                <div class="div-2">
                <button class="btn btn-info"> <a class="text-light" href="index.php"> Deconnexion </a> </button>
                </div>
            </div>

            <div class="mt-3 pull-right d-flex">
               
                
            </div>

            <div class="bienvenu">BIENVENUE DANS GETUD</div>
            <div class="global-content">
            <div class="page ">
                    <img src="font/images/logo univ.jpg" alt="logo de droit" class="minifed">
                </div>
                <div class="contenu">
                    <aside class="d-flex flex-column p-3">
                        <h3 id="navig">Menu navigation</h3>
                        <h3 class="btn btn-danger p-3 m-1"> <a class="text-light h-100 w-100" href="view/etudiant/list.php"> ETUDIANTS </a></h3>
                        <h3 class="btn btn-danger p-3 m-1"> <a class="text-light h-100 w-100" href="view/filiere/listF.php"> FILIERE </a></h3>
                    </aside>
                </div>
                
            </div>
            <?php
            include('include/footer.php');
            ?>
        </div>

    </body>

    </html>