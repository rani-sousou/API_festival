<?php
require_once '../base/CRUD.php';
$reponse= array();


if (isset($_POST['id_art'])
){
    $db= new methode();
    if($db->DeleteArtiste($_POST['id_art'])){
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


echo json_encode($reponse);
