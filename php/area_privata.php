<?php
require_once('./config.php');
session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: ./../../login.html");
    exit;
}
$sql = "SELECT * FROM eventi";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_NUM);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>
    <header>
        <img src="./assets/img/logo.PNG" alt="logo">
    </header>
    <main>
        <h2>
            <?php echo "Ciao " . $_SESSION["nome"]; ?> ecco i tuoi eventi
        </h2>
        <div>
            <?php
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                <div class="evento">
                    <h3>
                        <?php echo $row['nome_evento']; ?>
                    </h3>
                    <span>
                        <?php echo $row['data_evento']; ?>
                    </span>
                    <button>JOIN</button>
                </div>
                <?php
            }
            ?>
        </div>


        </div>

    </main>

</body>

</html>