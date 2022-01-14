<?php

class methode{

    private $connection;

    public function __construct()
    {
        include 'database.php';
        $db = new connection();
        $this->connection=$db->seconnecter();
    }
    /* Mise en place des méthodes CRUD Pour les évènements ci-dessous
    Create
    Read
    Update
    Delete
    */
    //Ajout de la fonction permettant d'ajouter des évènements dans la base de données
    function CreateEvent($Nom,$date,$id_art,$lieu,$Description){
        $etat= $this->connection->prepare("INSERT INTO `Evenement` (`id_even`, `Nom`, `date`, `id_art`, `lieu`,`Description`) VALUES (NULL,?,?,?,?,?);");
        $etat->bind_param("ssiss",$Nom,$date,$id_art,$lieu,$Description);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Ajout de la fonction permettant de supprimer des évènements
    function DeleteEvent($id){
        $etat= $this->connection->prepare("DELETE FROM `Evenement` WHERE `Evenement`.`id_even` = ?");
        $etat->bind_param("i",$id);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }
    }
    //Ajout de la fonction permettant de Modifier des évènements
    function UpdateEvent($id_even,$Nom,$lieu,$Date,$Description,$id_art){
        $etat=$this->connection->prepare("UPDATE `Evenement` SET `Nom` = ?, `date` = ?, `id_art` = ?, `lieu` = ?, `Description` = ?  WHERE `evenement`.`id_even` = ?;");
        $etat->bind_param("sssii", $Nom,$lieu,$Date,$Description,$id_even,$id_art);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }
    }
    //fonction ajoutant un artiste
    function AddArtiste($Nom,$Prenom,$age){
        $etat=$this->connection->prepare("INSERT INTO `artiste` ( `id_art`,`Nom`, `Prenom`, `age`) VALUES (NULL,?,?,?);");
        $etat->bind_param("ssi",$Nom,$Prenom,$age);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }

    }
    //fonction permettant la modification d'un artitse
    function UpdateArtiste($id_art,$Nom,$Prenom,$age){
        $etat=$this->connection->prepare("UPDATE `artiste` SET `Nom` = ?, `Prenom` = ?, `age` = ?  WHERE `artiste`.`id_art` = ?;");
        $etat->bind_param("sssi",$Nom,$Prenom,$age,$id_art);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }
    }
    function DeleteArtiste($id_art){
        $etat=$this->connection->prepare("DELETE FROM `artiste` WHERE `artiste`.`id_art` = ?");
        $etat->bind_param("i",$id_art);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }

    }

    //fonction ajoutant un utilisateur
    function AddUser($Nom,$email,$password){
        $etat=$this->connection->prepare("INSERT INTO `utilisateurs` ( `Nom`, `email`, `password`) VALUES (?,?,?,?);");
        $etat->bind_param("sss",$Nom,$email,$password);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }

    }
    //fonction permettant la modification d'un utilisateur
    function UpdateUser($id,$Nom,$email,$password){
        $etat=$this->connection->prepare("UPDATE `utilisateurs` SET `Nom` = ?, `email` = ?, `password` = ?  WHERE `utilisateur`.`id` = ?;");
        $etat->bind_param("sssi",$Nom,$email,$password,$id);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }
    }
    //fonction permettant de supprimer un utilisateur
    function DeleteUser($id){
        $etat=$this->connection->prepare("DELETE FROM `utilisateurs` WHERE `utilisateur`.`id` = ?");
        $etat->bind_param("i",$id);
        if($etat->execute()){
            return true;
        }else{
            return false;
        }

    }
    function auth(){

    }


}