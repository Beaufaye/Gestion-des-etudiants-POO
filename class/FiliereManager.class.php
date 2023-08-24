<?php

class FiliereManager
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function add(Filiere $Filiere)
   {
     $sql=$this->_db->prepare("INSERT INTO filiere(id_filiere,nom_filiere) VALUES(:id_filiere,:nom_filiere)");
     $sql->execute(array(
      "id_filiere"=>$Filiere->id_filiere,
      "nom_filiere"=>$Filiere->nom_filiere,
    ));
   }

   public function get($id_filiere)
   {
     $sql=$this->_db->prepare("SELECT * FROM filiere WHERE id_filiere=?");
     $sql->execute(array($id_filiere));
     $row=$sql->fetch();
     $sql->closeCursor();
     $serv=new Filiere($row);
     return $serv;
   }

   
   
   public function liste()
   {
     $serv=[];
     $sql=$this->_db->query("SELECT * FROM filiere");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {
     $serv[]=new Filiere($row);
     }
     return $serv;
   }

 
}

