<?php
require_once('config.php');
$email = $connessione->real_escape_string($_POST['email']);
$password = $connessione->real_escape_string($_POST['password']);
// $hash_password = password_hash($password, PASSWORD_DEFAULT);
// if ($_SERVER["REQUEST_MYMETHOD"] === "POST") {
$sql_select = "SELECT * FROM utenti WHERE email = '$email'";
if ($result = $connessione->query($sql_select)) {
    if ($result->num_rows == 1) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if (password_verify($password, $row['password'])) {

            session_start();
            $_SESSION['loggato'] = true;
            $_SESSION['nome'] = $row['nome'];

            header("location: ./area_privata.php");
        } else {
            echo "ps non corretta";
        }

    } else {
        echo "non ci sono account con questa email registrati";
    }
} else {
    echo "errore fase di login";
}
$connessione->close();
// } else {
//     echo "suca";
// }

// $email = $_POST['email'];
// $password = $_POST['password'];
// $hash_password = password_hash($password, PASSWORD_DEFAULT);
// // Query per verificare se l'email e la password sono corrette
// $sql = "SELECT * FROM utenti WHERE email = '$email' AND password = '$hash_password'";
// $result = mysqli_query($connessione, $sql);

// // Controlla se i dati di login sono corretti
// if (mysqli_num_rows($result) == 1) {
//     // Login corretto, reindirizza l'utente alla pagina "area-utenti.php"
//     header("Location: ./../area_privata.php");
// } else {
//     // Login fallito, mostra un messaggio di errore
//     echo "Email o password errati.";
// }

// // Chiude la connessione al database
// mysqli_close($connessione);
// ?>