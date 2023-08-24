<?php 

session_start();
$user=$_SESSION["user"];

require_once ("../../connexion.php");
require_once ("../../autoload.php");

$bd=bd();
$persManager=new EtudiantManager($bd);
$service=new FiliereManager($bd);
$list=$service->liste();
if(isset($_POST['id_filiere']) and $_POST['nom_filiere'])

{
    $persManager =new FiliereManager($bd);
    $pers=new Filiere($_POST);
    $persManager->add($pers);
    header("location: listF.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php
  include('../../include/head.php');
?>

<body>

    <div class="container" id="container">
        <?php
             include('../../include/header.php');
        ?>

        <div class="mt-3 pull-right d-flex">

            <button class="btn btn-info"> <a class="text-light" href="../../index.php"> Deconnexion </a> </button>
        </div>

        <div class="bienvenu">AJOUT D'UN ETUDIANT</div>
        <div class="global-content">
            <div class="contenu">
                <?php
             include('../../include/aside.php');
        ?>
            </div>
            <div class="cache">
                <div class="c-table">
                    <div class="bg-danger">
                        <form action="newf.php" method="post" class="row p-3 ">
                            <div class="col-md-12">
                                <label for="name" class="form-label text-light">Filiere</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Entrer le nom"
                                    name="nom" required>
                            </div>
                            <div class="panel-footer mt-3">
                                <button type="submit" class="btn btn-dark pull-left mr-3">Enregistrer <i
                                        class="fa fa-check-square-o ml-2"></i> </button>
                                <button type="button" class="btn btn-info pull-left"> <a class="text-light"
                                        href="list.php"> Fermer <i class="fa fa-close"></i> </a></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
             include('../../include/footer.php');
        ?>
    </div>

</body>

</html>