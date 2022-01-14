<?php
require_once '../base/CRUD.php';
$reponse = array();

if (!isset($_SERVER['PHP_AUTH_USER'])) { //si le user n'est pas defini

    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.04 401 Unauthorized");
    print "vous n avez pas les droits de faire cette action, connectez vous en tant qu admin";
    exit;
}

if (($_SERVER['PHP_AUTH_USER'] == "admin") && ($_SERVER["PHP_AUTH_PW"] == "azerty")) { //pour pouvoir se connecter de manière securisé
    print "Welcome admin ! , vous etes autorise a faire les actions CRUD \n";
    if (isset($_POST['Nom'])
        and isset($_POST['email'])
        and isset($_POST['password'])

    ) {
        $db = new methode();
        if ($db->AddUser($_POST['Nom'], $_POST['email'], $_POST['password'])) {
            $reponse['error'] = false;
            $reponse['message'] = "Un utilisateur a bien ete ajoute ! ";
        } else {
            $reponse['error'] = true;
            $reponse['message'] = "l utilisateur n a pas pu etre ajoute il y a peut etre une erreur ";
        }
    } else {
        $reponse['error'] = true;
        $reponse['message'] = "Veuillez bien entrer le Nom, l email et l'âssword sinon ca ne marchera pas ";
    }

}
echo json_encode($reponse);