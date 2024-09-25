<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanpassen Agenda-item</title>
    <style>
        /* Algemene opmaak */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Stijlen voor de container */
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Stijlen voor de titel */
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Stijlen voor de paragrafen */
        p {
            color: #666;
            margin-bottom: 20px;
        }

        /* Stijlen voor de formulieronderdelen */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        /* Stijlen voor tekstinvoervelden */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        /* Rollover-effect voor tekstinvoervelden */
        input[type="text"]:hover,
        textarea:hover {
            transform: scale(1.05);
            border-color: #3498db;
        }

        /* Stijlen voor de verzendknop */
        button[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        /* Rollover-effect voor de verzendknop */
        button[type="submit"]:hover {
            background-color: #2980b9;
        }

    </style>
</head>
<body>
<div class="container">
    <?php
    // Voeg de database-verbinding toe
    require 'config.php';

    // Lees de ID uit de link
    $ID = isset($_GET['ID']) ? $_GET['ID'] : '';

    // Controleer of het ID numeriek is
    if (is_numeric($ID)) {
        // Maak de query om het specifieke agenda-item op te halen
        $query = "SELECT * FROM crud_agenda WHERE ID = $ID";

        // Voer de query uit en vang het resultaat op
        $result = mysqli_query($mysqli, $query);

        // Controleer of de query succesvol is uitgevoerd
        if ($result && mysqli_num_rows($result) > 0) {
            // Verwerk de resultaten
            while ($item = mysqli_fetch_assoc($result)) {
                // Toon een tabel met gegevens van het te wijzigen item
                echo "<h1>Aanpassen Agenda-item</h1>";
                echo "<table>";
                echo "<tr><th>Onderwerp</th><td>{$item['Onderwerp']}</td></tr>";
                echo "<tr><th>Inhoud</th><td>{$item['Inhoud']}</td></tr>";
                echo "<tr><th>Begindatum</th><td>{$item['Begindatum']}</td></tr>";
                echo "<tr><th>Einddatum</th><td>{$item['Einddatum']}</td></tr>";
                echo "</table>";

                // Voeg een formulier toe om de gegevens aan te passen
                echo "<form action='pasaan_verwerk.php' method='post'>";
                echo "<input type='hidden' name='ID' value='$ID'>";
                echo "<div class='form-group'>";
                echo "<label for='onderwerp'>Onderwerp:</label>";
                echo "<input type='text' class='form-control' id='onderwerp' name='onderwerp' value='{$item['Onderwerp']}' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='inhoud'>Inhoud:</label>";
                echo "<textarea class='form-control' id='inhoud' name='inhoud' required>{$item['Inhoud']}</textarea>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='begindatum'>Begindatum:</label>";
                echo "<input type='text' class='form-control' id='begindatum' name='begindatum' value='{$item['Begindatum']}' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='einddatum'>Einddatum:</label>";
                echo "<input type='text' class='form-control' id='einddatum' name='einddatum' value='{$item['Einddatum']}' required>";
                echo "</div>";
                echo "<button type='submit' class='btn btn-primary'>Opslaan</button>";
                echo "</form>";
            }
        } else {
            // Geef een melding weer als er geen record is gevonden
            echo "<p>Geen agenda-item gevonden met ID: $ID</p>";
        }

        // Sluit de database-verbinding
        mysqli_close($mysqli);
    } else {
        // Geef een melding weer als het ID niet numeriek is
        echo "<p>Geen geldig ID gevonden voor aanpassing.</p>";
    }
    ?>
</div> <!-- Sluit container div -->
</body>
</html>
