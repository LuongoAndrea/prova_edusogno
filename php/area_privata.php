<?php
// collego il db 
require_once('config.php');
// sessione attiva
session_start();



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
        <!-- collegamento per cambiare la password -->
        <a href="reimposta_password.html"><button class="reimposta_password">Reimposta
                password</button></a>
    </header>
    <main>
        <h2>
            <!-- tramite il php concateno il nome in modo dinamico  -->
            <?php echo "Ciao " . $_SESSION["nome"]; ?> ecco i tuoi eventi
        </h2>
        <div class="eventi">
            <?php
            // assegno alla variabile $sql_select la query pre prendere tutte le righe dalla tabella eventi 
            $sql_select = "SELECT * FROM eventi";
            // assegno a $result e eseguo la query 
            $result = $connessione->query($sql_select);
            // controllo che non sia vuoto
            if ($result->num_rows > 0) {
                // con un ciclo while ciclo su ogni riga, creando una card evento per ogni riga
                while ($row = $result->fetch_assoc()) {
                    $nome = $row["nome_evento"];
                    // modifico il formato data
                    $data = date('d-m-Y H:i', strtotime($row['data_evento']));
                    ?>
                    <div class="card_evento">
                        <h3>
                            <?php echo $nome ?>
                        </h3>
                        <span>
                            <?php echo $data ?>
                        </span>
                        <button class="submit">Join</button>
                    </div>
                    <?php
                }
            } else {
                echo "Nessun risultato trovato.";
            }
            ?>


    </main>
    <section>
        <div class="cerchio-grosso"><img src="./../assets/img/Ellipse 13.png" alt=""></div>
        <div class="cerchio-piccolo"><img src="./../assets/img/Ellipse 12.png" alt=""></div>
        <div class="onde">
            <div class="onda2"><img src="./../assets/img/Vector 4.png" alt=""></div>
            <div class="onda3"><img src="./../assets/img/Vector 5.png" alt=""></div>
            <div class="onda1"><img src="./../assets/img/Vector 1.png" alt=""></div>

        </div>

        <div class="razzo">
            <div class="punta"><img src="./../assets/img/Polygon 1.png" alt=""></div>
            <div class="corpo"><img src="./../assets/img/Rectangle 1083.png" alt=""></div>
            <div class="ala-sinistra"><img src="./../assets/img/Vector 2.png" alt=""></div>
            <div class="ala-destra"><img src="./../assets/img/Vector 3.png" alt=""></div>
            <div class="ala-centro"><img src="./../assets/img/Rectangle 1084.png" alt=""></div>
            <div class="oblo"><img src="./../assets/img/Ellipse 11.png" alt=""></div>
        </div>
    </section>
</body>

</html>