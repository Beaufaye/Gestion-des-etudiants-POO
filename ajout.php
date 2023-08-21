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
                    <p>GESTIONS DES ETUDIANTS</p>
                </div>

                <div class="div-2">
                
                <button class="btn btn-info"> <a class="text-light" href="index.php"> Deconnexion </a> </button>
                </div>
            </div>

           

            <div class="bienvenu">BIENVENUE DANS GETUD</div>
            <div class="global-content">
                <div class="contenu">
                    <aside class="d-flex flex-column p-3">
                        <h3 id="navig">Menu navigation</h3>
                        <h3 class="btn btn-info p-3 m-1"> <a class="text-light h-100 w-100" href="voir/liste_etudiant.php"> LISTE DES ETUDIANTS </a> </h3>
                        <h3 class="btn btn-info p-3 m-1"> <a class="text-light h-100 w-100" href=".php"> GERER ETUDIANTS </a></h3>
                        <h3 class="btn btn-info p-3 m-1"> <a class="text-light h-100 w-100" href=".php"> PERSONNELS </a></h3>
                        
                    </aside>

                </div>
                <div class="page">
                    
              ------------stevie formulaire 
                <div class="m-5 bg-danger">
                <form action="insertion_apprenants.php" method="post" class="row p-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label text-light">Nom</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Entrer le nom" name="nom" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label text-light">Prénom</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Entrer le prénom" name="prenom" required>
                </div>
                <div class="col-md-6">
                    <label for="inputAddress" class="form-label text-light">Date de naissance</label>
                    <input type="date" class="form-control" id="inputAddress" name="date_naiss" required>
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label text-light">Sexe</label>
                    <select id="inputState" class="form-select" name="sexe" required>
                        <option selected>Choisissez..</option>
                        <option>Masculin</option>
                        <option>Feminin</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label text-light">Tuteur</label>
                    <?php              
              $bdd= new PDO('mysql:host=localhost;dbname=annuaire','root','');

              $reponse = $bdd->query('SELECT nom, prenom FROM tuteur');
            ?>
                <select name="tuteur" id="inputState" class="form-select">
                    
                    <?php while ($d = $reponse->fetch()) { ?>

                    <option><?= $d['nom'] ?> <?= $d['prenom'] ?></option>
                    <?php } ?>
                </select>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label text-light">Ville</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Entrer la ville" name="ville" required>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label text-light" >Contact</label>
                    <input type="number" class="form-control" id="inputZip" placeholder="Entrer le contact" name="contact" required>
                </div>
                <div class="col-12">
                  
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-dark" id="sendapprenants" type="submit" value="Ajouter" name="ajouter" onclick='return confirmation()'>Enregistrer</button>
                    <button type="submit" class="btn btn-light" id="annuler" type="" value="Annuler" name="annuler">Annuler</button>
                </div>
         

            
        </form>
    </div>


    <script type="text/javascript" src="js/navigateur.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/details.js"></script>



    <script>
    function confirmation() {
        return confirm('Voulez-vous enregistrer cet apprenant?');
    }
    </script>



    <script type="text/javascript">
    afficher('formulaire');
    </script>


                </div>
            </div>
            <?php
            include('footer.php');
            ?>
        </div>

    </body>

    </html>