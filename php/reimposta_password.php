<?php
require_once('config.php');
session_start();
// inizializzo le variabili
$old = $_POST['password-vecchia'];
$new = $_POST['password-nuova'];
$email = $_SESSION['email'];
// query per trovare l'utente che sta cambiando la password
$sql_select = "SELECT * FROM utenti WHERE email = '$email'";
// controllo che le password siano diverse
if ($old !== $new) {
    // eseguo la quesry
    if ($result = $connessione->query($sql_select)) {
        // controllo che ci sia un solo utente con la email 
        if ($result->num_rows == 1) {
            // associo l'array a $row
            $row = $result->fetch_array(MYSQLI_ASSOC);
            // controllo che la password vecchia sia corretta
            if (password_verify($old, $row['password'])) {
                // genero un hash della nuova password
                $hash_password = password_hash($new, PASSWORD_DEFAULT);
                // assegno la query per modificare la vecchia password
                $sql_update = "UPDATE `utenti` SET `password`='$hash_password' WHERE email = '$email'";
                // eseguo la query
                $result2 = $connessione->query($sql_update);
                // renderizzo l'utente alla login.html
                header("location: ./../login.html");
            } else {
                echo "password vecchia non corretta";
            }

        } else {
            echo "errore nessuna email registrata";
        }
    }
} else {
    echo "password uguali";
}