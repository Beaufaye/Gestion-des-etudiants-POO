<?php

class etudiantM
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function add(etudiant $etud)
   {
     $sql=$this->_db->prepare("INSERT INTO etudiant(id_etudiant,nom,prenom,date_de_naissance,nationalite,adresse,sexe,contact,filiere,niveau) 
     VALUES(:id_etudiant,:nom,:prenom,:date_de_naissance,:nationalite,:adresse,:sexe,:contact,:filiere,:niveau)");
     $sql->execute(array(
      "id_etudiant"=>$etud->id_etudiant,
      "nom"=>$etud->nom,
      "prenom"=>$etud->prenom,
      "date_de_naissance"=>$etud->date_de_naissance,
      "nationalite"=>$etud->nationalite,
      "adresse"=>$etud->adresse,
      "sexe"=>$etud->sexe,
      "contact"=>$etud->contact,
      "filiere"=>$etud->adresse,
      "niveau"=>$etud->niveau
    ));
   }

   public function get($id_etudiant)
   {
     $sql=$this->_db->prepare("SELECT * FROM etudiant WHERE id_etudiant=?");
     $sql->execute(array($id_etudiant));
     $row=$sql->fetch();
     $sql->closeCursor();
     $pers=new etudiant($row);
     return $pers;
   }

   public function delete($id_etudiant)
   {
       $sql=$this->_db->prepare("DELETE FROM etudiant WHERE id_etudiant=?");
       $sql->execute(array($id_etudiant));
   }
   
   public function liste()
   {
     $pers=[];
     $sql=$this->_db->query("SELECT * FROM etudiant");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {
     $pers[]=new etudiant($row);
     }
     return $pers;
   }

 public function edit(etudiant $etud)
   {
     try{ 
            $sql=$this->_db->prepare("UPDATE etudiant SET id_etudiant=:id_etudiant,
            nom=:nom, prenom=:prenom, date_de_naissance=:date_de_naissance, nationalite=:nationalite, adresse=:adresse, sexe=:sexe,
            contact=:contact, filiere=:filiere, niveau=:niveau WHERE id_etudiant=:id_etudiant");
            $d=$sql->execute(array(
                "id_etudiant"=>$etud->id_etudiant,
                "nom"=>$etud->nom,
                "prenom"=>$etud->prenom,
                "date_de_naissance"=>$etud->date_de_naissance,
                "nationalite"=>$etud->nationalite,
                "adresse"=>$etud->adresse,
                "sexe"=>$etud->sexe,
                "contact"=>$etud->contact,
                "filiere"=>$etud->adresse,
                "niveau"=>$etud->niveau
          ));  

     } catch (Exception $ex) {
         echo $ex->getMessage();
     }
   }
}
