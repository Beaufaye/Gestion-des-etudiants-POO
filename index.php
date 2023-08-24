<?php
require_once ("connexion.php");
  include("class/compte.class.php");
  $bd= bd();
  $compte =new compte($bd);
if (isset($_POST["username"]) AND isset($_POST["password"])) {
    
    $user=$compte->authenticate($_POST["username"],$_POST["password"]);
    if ($user!=false) {
        session_start();
        $_SESSION["user"]=$user[0];
        header("location:acceuil.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>connexion</title>
      <link rel="icon" href="picture/simplonco ulule.png" type="image">
      <link rel="stylesheet" media="screen" href="font/css/login.css">
      <link rel="stylesheet" href="font/css/font-awesome.min.css">
      <link rel="stylesheet" href="font/css/bootstrap.min.css">
      <link rel="stylesheet" href="font/css/style.css">
    </head>
   <body>
           
            
            <div class="right  bg-white">
                <h3 class="auth m-3">AUTHENTIFICATION</h3>
                <div class="d-flex auth">
                 <img src="font/images/logo univ.jpg" alt="image lest" class="ent-img">
                </div>
            <form class=" form p-4 d-flex flex-column w-100" action="" method="POST" enctype="multipart/form-data">
                <label for="">Nom d'utilisateur</label>      
                <input type="text" class="champ" name="username" required>
                <label for="">Mot de passe</label>   
                <input type="password" class="champ" name="password"> 
                <div class="panel-footer mt-3">
                    <button type="submit" class="btn btn-danger pull-left mr-3"> Se Connecter </button>
                </div>
            </form>
            </div>
            <div class="left bg-image" style="background-image: url(./font/images/ge1.png)">
                 <h2 class="text-danger"> BIENVENUE DANS GETUD </h2>
                 <h3 class="text-dark"> Une plateforme de Gestion des étudiants de l'Université Thomas SANKARA </h3>
            </div>
   </body>
   
</html>
