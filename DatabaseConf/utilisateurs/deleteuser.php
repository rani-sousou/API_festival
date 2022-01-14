<?php
require_once '../base/CRUD.php';
$reponse= array();


if (isset($_POST['id'])
){
    $db= new methode();
    if($db->DeleteUser($_POST['id'])){
        $reponse['error']=false;
        $reponse['message']="Un utilisateur a bien ete ajoute ! ";
    }else{
        $reponse['error']=true;
        $reponse['message']="l utilisateur n a pas pu etre ajoute il y a peut etre une erreur ";
    }
}else{
    $reponse['error']=true;
    $reponse['message']="Veuillez bien entrer le Nom, l email et l'password sinon ca ne marchera pas ";
}


echo json_encode($reponse);
