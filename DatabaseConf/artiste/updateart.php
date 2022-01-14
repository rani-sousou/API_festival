<?php
require_once '../base/CRUD.php';
$reponse= array();


if (isset($_POST['Nom'])
    and isset($_POST['Prenom'])
    and isset($_POST['age'])
){
    $db= new methode();
    if($db->UpdateArtiste($_POST['Nom'],$_POST['Prenom'],$_POST['age'],$_POST['id_art'])){
        $reponse['error']=false;
        $reponse['message']="Un artiste a bien ete ajoute ! ";
    }else{
        $reponse['error']=true;
        $reponse['message']="l artiste n a pas pu etre ajoute il y a peut etre une erreur ";
    }
}else{
    $reponse['error']=true;
    $reponse['message']="Veuillez bien entrer le Nom, le Prenom et l'age sinon ca ne marchera pas ";
}