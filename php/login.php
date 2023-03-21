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
            $_SESSION['email'] = $row['email'];

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
?>