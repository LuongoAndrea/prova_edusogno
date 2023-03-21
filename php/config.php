<?php
$host = "127.0.0.1";
$user = "root";
$password = "root";
$database = "edusogno_db";
$connessione = new mysqli($host, $user, $password, $database);

if ($connessione === false) {
    die("Errore durante la connessione: " . $connessione->connect_error);
}

?>