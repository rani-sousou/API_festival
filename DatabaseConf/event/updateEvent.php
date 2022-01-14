<?php
require_once '../base/CRUD.php';
$reponse= array();


if (isset($_POST['Nom'])
    and isset($_POST['date'])
    and isset($_POST['id_art'])
    and isset($_POST['lieu'])
    and isset($_POST['Description'])
){
    $db= new methode();
    if($db->UpdateEvent($_POST['Nom'],$_POST['date'],$_POST['id_art'],$_POST['lieu'],$_POST['Description'])){
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
