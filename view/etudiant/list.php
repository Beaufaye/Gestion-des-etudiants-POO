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

    <div class="mt-3 pull-right d-flex">
      <button class="btn btn-info"> <a class="text-light" href="../../index.php"> Deconnexion </a> </button>
    </div>

    <div class="bienvenu">LISTE DES ETUDIANTS</div>
    <div class="global-content">
      <div class="contenu">
        <?php
        include('../../include/aside.php');
        ?>
      </div>
      <div class="cache">
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
              <th scope="col">N°</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Nationalité</th>
                <th scope="col">Adresse</th>
                <th scope="col">Sexe</th>
                <th scope="col">Contact</th>
                <th scope="col">Filière</th>
                <th scope="col">Niveau</th>
              </tr>
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
              
                $sql = bd()->query('SELECT * FROM etudiant ORDER BY nom ASC');
                $i=0;
                  
                while ($donnees = $sql->fetch())
                {
                    $i++;
                    echo "<tr>";
                    echo "<td> $i </td>";
                    echo "<td> $donnees[nom] </td>";
                    echo "<td> $donnees[prenom] </td>";
                    echo "<td> $donnees[date_de_naissance] </td>";
                    echo "<td> $donnees[nationalite] </td>";
                    echo "<td> $donnees[adresse] </td>";
                    echo "<td> $donnees[sexe] </td>";
                    echo "<td> $donnees[contact] </td>";
                    echo "<td> $donnees[filiere] </td>";
                    echo "<td> $donnees[niveau] </td>";
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
        <button type="button" class="btn btn-danger pull-left m-3"> <a class="text-light" href="new.php"> Ajouter <i class="fa fa-plus"></i> </a> </button>
      </div>
    </div>
    <?php
    include('../../include/footer.php');
    ?>
  </div>

</body>

</html>
