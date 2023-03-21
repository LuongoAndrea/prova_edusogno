<?php
// collego il db
$host = "127.0.0.1";
$user = "root";
$password = "root";
$database = "edusogno_db";
$connessione = new mysqli($host, $user, $password, $database);

if ($connessione === false) {
    // se la connessione no dovesse avvenire con successo utilizzo connect_error per capire il problema
    die("Errore durante la connessione: " . $connessione->connect_error);
}

?>