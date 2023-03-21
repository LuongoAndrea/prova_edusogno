<?php
require_once('config.php');
session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: ./../login.html");
    exit;
}
$old = $_POST['password-vecchia'];
$new = $_POST['password-nuova'];
$mail = $_SESSION['email'];
$sql_select = "SELECT * FROM utenti WHERE email = '$mail'";
if ($result = $connessione->query($sql_select)) {
    if ($result->num_rows == 1) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if (password_verify($old, $row['password'])) {
            $hash_password = password_hash($new, PASSWORD_DEFAULT);
            $sql_update = "UPDATE `utenti` SET `password`='$hash_password' WHERE email = '$mail'";
            $result2 = $connessione->query($sql_update);

            header("location: ./../login.php");
        } else {
            echo "password vecchia non corretta";
        }

    } else {
        echo "errore nessuna mail registrata";
    }
}