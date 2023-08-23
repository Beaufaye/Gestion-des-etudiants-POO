<?php
    include('connexion.php');
    
    include('menu.php');

 
      $bd=bd();
      $etudMan=new etudiantM($bd);
      $service=new filiereM($bd);
      $list=$service->liste();
      if(isset($_POST['id_etudiant']) and $_POST['id_filiere'] and $_POST['id_niveau'] 
      and $_POST['nom'] and $_POST['prenom'] and $_POST['date_de_naissance'] and $_POST['nationalité']
       and $_POST['adresse'] and $_POST['sexe'] and $_POST['contact'] and $_POST['filiere'])

    {
        $etudMan =new etudiantM($bd);
        $etud=new etudiant($_POST);
        $etudMan->add($pers);
        header("location: liste_etudiant.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<?php
  include('menu.php');
?>
<body>

    <div class="container" id="container">
     
    <div class="mt-3 pull-right d-flex">  
        <i class="fa fa-user mr-3 user"> <span class="ml-2"> <?= $user["statut"];?> </span> </i>
        <button class="btn btn-info"> <a class="text-light" href="../../index.php"> Deconnexion </a> </button>
    </div>

        <div class="bienvenu">INSERTION D'UN AGENT</div>
      <div class="global-content">
        <div class="contenu">
        <?php
             include('../../include/aside.php');
        ?>
        </div>
            <div class="cache">
                <div class="c-table">
                    <p style="color: red;">Veuillez remplir les champs * </p>

            <form class=" form p-4 d-flex flex-column w-100" action="ajout.php" method="POST" enctype="multipart/form-data">
                <label for="">Nom</label>
                <input type="text" class="champ" name="nom">
                <label for="">Prenom</label>      
                <input type="text" class="champ" name="prenom" required>
                <label for="">Date de Naissance</label>   
                <input type="date" class="champ" name="date_de_naissance" required>
                <label for="">nationalité</label>   
                <input type="text" class="champ" name="nationalité" required> 
                <label for="">adresse</label>   
                <input type="text" class="champ" name="Categorie">
                <label for="">sexe</label>   
                <input type="text" class="champ" name="sexe">
                <label for="">contact</label>   
                <input type="text" class="champ" name="contact">
                <label for="">Filiere</label>
                <select class="champ" name="filiere">
                  <?php
                    foreach($list as $key){
                  ?> 
                    <option value="<?php echo $key->nom ?>"><?php echo $key->nom?></option>;
                  <?php
                  }
                  ?>
                </select>  
                <label for="">Niveau</label>   
                <select name="niveau" id=""><option value="">1</option>
                <option value="">2</option>
                <option value="">3</option></select>

                <div class="panel-footer mt-3">
                    <button type="submit" class="btn btn-info pull-left mr-3">Enregistrer <i class="fa fa-check-square-o ml-2"></i> </button>
                    <button type="button" class="btn btn-info pull-left"> <a class="text-light" href="list.php"> Fermer <i class="fa fa-close"></i> </a></button>
                </div>
            </form>
                </div>
            </div>
      </div>
       <?php
            include('footer.php');
            ?>
 
    </div>
    
</body>
</html>
