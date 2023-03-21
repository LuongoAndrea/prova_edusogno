<?php
require_once('config.php');
session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: ./../login.html");
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" href="./../assets/styles/style.css">
</head>

<body>
    <header>
        <img src="./../assets/img/logo.PNG" alt="logo">
    </header>
    <main>
        <h2>
            <?php echo "Ciao " . $_SESSION["nome"]; ?> ecco i tuoi eventi
        </h2>
        <?php
        $sql_select = "SELECT * FROM eventi";
        $result = $connessione->query($sql_select);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nome = $row["nome_evento"];
                $data = $row["data_evento"];
                ?>
                <div class="card_evento">
                    <h3>
                        <?php echo $nome ?>
                    </h3>
                    <span>
                        <?php echo $data ?>
                    </span>
                    <button>Join</button>
                </div>
                <?php
            }
        } else {
            echo "Nessun risultato trovato.";
        }
        ?>

        </div>

    </main>

</body>

</html>