<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder Agenda Item</title>
    <style>
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

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
            max-width: 600px;
            width: 80%;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    require 'config.php';

    if (isset($_GET['ID']) && isset($_GET['bevestiging']) && $_GET['bevestiging'] === 'ja') {
        $id = $_GET['ID'];

        // Toon het ID op het scherm
        echo "<h1>Verwijder item met ID: $id</h1>";

        // Maak de query om het item te verwijderen
        $query = "DELETE FROM crud_agenda WHERE ID = $id";

        // Voer de query uit en vang het 'resultaat' (true/false) op
        $result = mysqli_query($mysqli, $query);

        // Als het is gelukt
        if ($result) {
            echo "<p>Het item is verwijderd</p>";
        } else {
            echo "<p>FOUT bij verwijderen</p>";
            echo "<p>" . mysqli_error($mysqli) . "</p>"; // Tijdelijk (!) de foutmelding tonen
        }
    } else {
        echo "<p>Verwijdering geannuleerd of ongeldig verzoek.</p>";
    }
    ?>

    <a class="btn" href="toonagenda.php">Terug naar agenda</a>
</div>
</body>
</html>
