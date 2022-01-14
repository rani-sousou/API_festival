<?php
require_once '../base/CRUD.php';
$reponse= array();


if (isset($_POST['id_even'])
){
    $db= new methode();
    if($db->DeleteEvent($_POST['id_even'])){
        $reponse['error']=false;
        $reponse['message']="Un evenement a bien ete ajoute ! ";
    }else{
        $reponse['error']=true;
        $reponse['message']="l evenement n a pas pu etre ajoute il y a peut etre une erreur ";
    }
}else{
    $reponse['error']=true;
    $reponse['message']="Veuillez bien entrer le Nom, le lieu , la date, la description et l'id_art sinon ca ne marchera pas ";
}




echo json_encode($reponse);

