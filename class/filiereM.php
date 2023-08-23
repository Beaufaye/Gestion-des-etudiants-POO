<?php

class filiereM
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function add(filiere $filiere)
   {
     $sql=$this->_db->prepare("INSERT INTO filiere(id_filiere,nom) VALUES(:id_filiere,:nom)");
     $sql->execute(array(
      "id_filiere"=>$filiere->id_filiere,
      "nom"=>$filiere->nom,
    ));
   }

   public function get($id_filiere)
   {
     $sql=$this->_db->prepare("SELECT * FROM filiere WHERE id_filiere=?");
     $sql->execute(array($id_filiere));
     $row=$sql->fetch();
     $sql->closeCursor();
     $serv=new filiere($row);
     return $serv;
   }

   public function liste()
   {
     $serv=[];
     $sql=$this->_db->query("SELECT * FROM filiere");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {
     $serv[]=new filiere($row);
     }
     return $serv;
   }

 public function edit(filiere $filiere)
   {
     try{ 
            $sql=$this->_db->prepare("UPDATE service SET id_filiere=:IdService, nom=:nom WHERE id_filiere=:id_filiere");
            $sql->execute(array(
            ",id_filiere"=>$filiere->id_filiere,
            "nom"=>$filiere->nom));  

     } catch (Exception $ex) {
         echo $ex->getMessage();
     }
   }
}