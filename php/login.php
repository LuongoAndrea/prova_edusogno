<?php
// collego il db
require_once('config.php');

$email = $connessione->real_escape_string($_POST['email']);
$password = $connessione->real_escape_string($_POST['password']);
// preparo la query per prendere l'utente con la mail inserita
$sql_select = "SELECT * FROM utenti WHERE email = '$email'";
// eseguo la query
if ($result = $connessione->query($sql_select)) {
    // controllo che ci sia una sola riga con quella email
    if ($result->num_rows == 1) {
        // associo l'array a $row
        $row = $result->fetch_array(MYSQLI_ASSOC);
        // controllo che la password combaci 
        if (password_verify($password, $row['password'])) {
            // faccio partite la sessione
            session_start();
            $_SESSION['loggato'] = true;
            // inizializzo le variabili col nome e la mail dell'utente
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            // reindirizzo l'utente alla propria area privata
            header("location: ./area_privata.php");
        } else {
            echo "password non corretta";
        }

    } else {
        echo "non ci sono account con questa email registrati";
    }
} else {
    echo "errore fase di login";
}
$connessione->close();
?>