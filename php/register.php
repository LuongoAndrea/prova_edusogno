<?php

require_once('./config.php');

$nome = $connessione->real_escape_string($_POST['nome']);
$cognome = $connessione->real_escape_string($_POST['cognome']);
$email = $connessione->real_escape_string($_POST['email']);
$password = $connessione->real_escape_string($_POST['password']);
$hash_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO utenti (nome,cognome,email,password) VALUES ('$nome','$cognome','$email','$hash_password')";
if ($connessione->query($sql) === true) {
    header("location: ./../login.html");
} else {
    echo "errore";
}
?>