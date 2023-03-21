<?php
// collego il db
require_once('./config.php');

// inizializzo le variabili
$nome = $connessione->real_escape_string($_POST['nome']);
$cognome = $connessione->real_escape_string($_POST['cognome']);
$email = $connessione->real_escape_string($_POST['email']);
$password = $connessione->real_escape_string($_POST['password']);
// genero un hash della password
$hash_password = password_hash($password, PASSWORD_DEFAULT);
// creo la query per popolare la tabella utenti con i dati dell'utente
$sql = "INSERT INTO utenti (nome,cognome,email,password) VALUES ('$nome','$cognome','$email','$hash_password')";
// controllo se la query venga eseguita con successo
if ($connessione->query($sql) === true) {
    // renderizzo alla pagina di login l'utente
    header("location: ./../login.html");
} else {
    echo "errore";
}
?>