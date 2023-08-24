
<?php

class EtudiantManager
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function add(Etudiant $etud)
   {
     $sql=$this->_db->prepare("INSERT INTO etudiant(id_etudiant, nom, prenom, date_de_naissance, nationalite, sexe, contact, filiere, niveau) 
     VALUES(:id_etudiant, :nom, :prenom, :date_de_naissance, :nationalite, :filiere, :niveau)");
     $sql->execute([
      "id_etudiant"=>$etud->id_etudiant,
      "nom"=>$etud->nom,
      "prenom"=>$etud->prenom,
      "date_de_naissance"=>$etud->date_de_naissance,
      "nationalite"=>$etud->nationalite,
      "filiere"=>$etud->filiere,
      "niveau"=>$etud->niveau
    ]);
   }

   public function get($id_etudiant)
   {
     $sql=$this->_db->prepare("SELECT * FROM etudiant WHERE id_etudiant=?");
     $sql->execute(array($id_etudiant));
     $row=$sql->fetch();
     $sql->closeCursor();
     $etu=new Etudiant($row);
     return $etu;
   }

  
   
   public function liste()
   {
     $etu=[];
     $sql=$this->_db->query("SELECT * FROM etudiant");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {
     $etu[]=new Etudiant($row);
     }
     return $etu;
   }

}
