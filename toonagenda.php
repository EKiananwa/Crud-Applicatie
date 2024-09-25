<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Items</title>
    <style>
        /* Plak hier de CSS-stijlen */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .agenda-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .agenda-item:hover {
            background-color: #f9f9f9;
        }

        .agenda-item h3 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .agenda-item p {
            margin: 5px 0;
            color: #666;
        }

        .agenda-item a {
            text-decoration: none;
            color: #3498db;
            margin-right: 10px; /* Extra styling for spacing */
        }

        .agenda-item a:hover {
            text-decoration: underline;
        }

        .table-container {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .table-container p {
            margin: 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    // Voeg de database-verbinding toe
    require 'config.php';

    // Maak de query
    $query = "SELECT * FROM crud_agenda";

    // Voer de query uit en vang het resultaat op
    $result = mysqli_query($mysqli, $query);

    // ALS er records zijn....
    if (mysqli_num_rows($result) > 0) {
        // Toon de gegevens van de items
        echo "<h1>Agenda Items:</h1>";
        echo "<ul>";
        while ($item = mysqli_fetch_assoc($result)) {
            echo "<li class='agenda-item'>";
            echo "<h3>{$item['Onderwerp']}</h3>";
            echo "<p>{$item['Inhoud']}</p>";
            echo "<a href='detail.php?ID={$item['ID']}'>Details</a>";
            echo "<a href='pasaan.php?ID={$item['ID']}'>Aanpassen</a>"; // Toegevoegde link naar aanpaspagina
            echo "<a href='verwijder.php?ID={$item['ID']}'>Verwijder</a>"; // Link naar verwijderpagina
            echo "</li>";
        }
        echo "</ul>";

        // Maak een tabel
        echo "<div class='table-container'>";
        echo "<table>";
        // Eerst de headers van de tabel
        echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Detail</th><th>Aanpassen</th><th>Verwijder</th></tr>";

        // Zolang er items uit te lezen zijn...
        mysqli_data_seek($result, 0); // Reset pointer to the beginning
        while ($item = mysqli_fetch_assoc($result)) {
            // Toon de gegevens van het item in een tabelrij
            echo "<tr>";
            echo "<td>{$item['Onderwerp']}</td>";
            echo "<td>{$item['Inhoud']}</td>";
            echo "<td><a href='detail.php?ID={$item['ID']}'>Details</a></td>";
            echo "<td><a href='pasaan.php?ID={$item['ID']}'>Aanpassen</a></td>"; // Toegevoegde link naar aanpaspagina
            echo "<td><a href='verwijder.php?ID={$item['ID']}'>Verwijder</a></td>"; // Link naar verwijderpagina
            echo "</tr>";
        }

        // Sluit de tabel af
        echo "</table>";
        echo "</div>"; // Sluit table-container div
    } else {
        // Als er geen records zijn...
        echo "<p>Geen items gevonden!</p>";
    }

    // Sluit de database-verbinding
    mysqli_close($mysqli);
    ?>
</div> <!-- Sluit container div -->
</body>
</html>
