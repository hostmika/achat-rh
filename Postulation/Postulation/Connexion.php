<?php
    function connex(){
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db = new PDO('mysql:host=localhost;dbname=gestion_rh;charset=utf8', 'root', '');
        if($conn->connect_error){
            die('Erreur : ' .$conn->connect_error);
        }
        return $con;
    }
?>