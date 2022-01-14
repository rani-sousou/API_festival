<?php
require_once '../base/CRUD.php';
$reponse= array();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!isset($_SERVER['PHP_AUTH_USER'])){

        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.04 401 Unauthorized");
        print "vous n avez pas les droits de faire cette action, connectez vous en tant qu admin";
        exit;


    }else{
        if(($_SERVER['PHP_AUTH_USER']=="admin") && ($_SERVER["PHP_AUTH_PW"]=="azerty")){
            print "Welcome admin ! , vous etes autorise a faire les actions CRUD \n";
            if (isset($_POST['Nom'])
                and isset($_POST['Prenom'])
                and isset($_POST['age'])

            ){
                $db= new methode();
                if($db->AddArtiste($_POST['Nom'],$_POST['Prenom'],$_POST['age'])){
                    $reponse['error']=false;
                    $reponse['message']="Un artiste a bien ete ajoute ! ";
                }else{
                    $reponse['error']=true;
                    $reponse['message']="l artiste n a pas pu etre ajoute il y a peut etre une erreur ";
                }
            }else{
                $reponse['error']=true;
                $reponse['message']="Veuillez bien entrer les infos(Nom,Prenom,age) sinon ca ne marchera pas ";
            }
        }else{
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.04 401 Unauthorized");
            print "vous n avez pas les droits de faire cette action, connectez vous en tant qu admin";
            exit;
        }

    }

}else{
    $reponse['error']=true;
    $reponse['message']='Requete non valide ';
}
echo json_encode($reponse);