<?php
//création d'une classe
class connection{
    private $con;

    public function construct(){
    }

    public function seconnecter(){
        include 'constante.php';
        $this->con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if (mysqli_connect_errno()){
            echo 'Echec de la connection à la base de données'.mysqli_connect_error();
        }
        return $this->con;
    }

}

