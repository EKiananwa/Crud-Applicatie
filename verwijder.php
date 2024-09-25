<?php
// Voeg de database-verbinding toe
require 'config.php';

if (isset($_GET['ID']) && !empty($_GET['ID'])) {
    // Haal het ID op uit de URL-parameter
    $id = $_GET['ID'];

    // Maak de query om het item op te halen
    $query = "SELECT * FROM crud_agenda WHERE ID = $id";

    // Voer de query uit en vang het resultaat op
    $result = mysqli_query($mysqli, $query);

    // Controleer of er een resultaat is gevonden
    if (mysqli_num_rows($result) == 1) {
        // Haal de gegevens van het item op
        $item = mysqli_fetch_assoc($result);

        // Toon het ID, onderwerp en inhoud van het item op het scherm
        echo "<h1>Verwijder item: {$item['Onderwerp']}</h1>";
        echo "<p>ID: {$item['ID']}</p>";
        echo "<p>Onderwerp: {$item['Onderwerp']}</p>";
        echo "<p>Inhoud: {$item['Inhoud']}</p>";
        echo "<p>Weet je zeker dat je dit item wilt verwijderen?</p>";
        echo "<a href='verwijder_verwerk.php?ID={$item['ID']}&bevestiging=ja'>Ja</a> ";
        echo "<a href='toonagenda.php'>Nee</a><br/><br/>";
    } else {
        echo "<p>Geen geldig agenda-item gevonden.</p>";
    }
} else {
    echo "<p>Geen geldig ID ontvangen.</p>";
}

// Sluit de database-verbinding
mysqli_close($mysqli);
?>
