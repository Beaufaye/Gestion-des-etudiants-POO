<?php

session_start();
$user = $_SESSION["user"];

require_once("../../connexion.php");
require_once("../../autoload.php");

function refractor($id)
{
  $db = bd();
  $direct = new FiliereManager($db);
  $get = $direct->get($id);
  return $get->nom_filiere;
}

$bd = bd();
$persManag = new FiliereManager($bd);
$list = $persManag->liste();

if (isset($_GET['id_etudiant'])) 
?>

<?php
include('../../include/head.php');
?>

<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">

<body>

  <div class="container" id="container">
    <?php
    include('../../include/header.php');
    ?>

    

    <div class="bienvenu">LISTE DES FILIERES</div>
    <div class="global-content">
      <div class="cache">
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr class="bg-danger">
              <th scope="col" class="text-light">N°</th>
                <th scope="col" class="text-light">Nom</th>
            </thead>
          </table>
        </div>
        <div class="tbl-content">
          <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
                <tr>
                <?php
                try
                {
              
                $sql = bd()->query('SELECT * FROM filiere ORDER BY nom_filiere ASC');
                $i=0;
                  
                while ($donnees = $sql->fetch())
                {
                    $i++;
                    echo "<tr>";
                    echo "<td> $i </td>";
                    echo "<td> $donnees[nom_filiere] </td>";
                    echo "</tr>";
                }
                $sql->closeCursor();
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
              ?>
                </tr>
            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-danger pull-left m-3"> <a class="text-light" href="newf.php"> Ajouter <i class="fa fa-plus"></i> </a> </button>
      </div>
      <div class="contenu">
        <?php
        include('../../include/aside.php');
        ?>
      </div>
    </div>
    
    <?php
    include('../../include/footer.php');
    ?>
  </div>

</body>

</html>