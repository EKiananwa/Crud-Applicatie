<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ontvang de gegevens uit het formulier
    $ID = $_POST["ID"];
    $onderwerp = $_POST["onderwerp"];
    $inhoud = $_POST["inhoud"];
    $begindatum = $_POST["begindatum"];
    $einddatum = $_POST["einddatum"];

    // Update de gegevens in de database
    $updateQuery = "UPDATE crud_agenda SET Onderwerp=?, Inhoud=?, Begindatum=?, Einddatum=? WHERE ID=?";
    $stmt = mysqli_prepare($mysqli, $updateQuery);
    mysqli_stmt_bind_param($stmt, 'ssssi', $onderwerp, $inhoud, $begindatum, $einddatum, $ID);
    $result = mysqli_stmt_execute($stmt);

    // Als het is gelukt
    if ($result) {
        echo "<p class='text-success'>Het item is aangepast</p>";
    } else {
        // Als het niet is gelukt
        echo "<p class='text-danger'>Fout bij aanpassen</p>";
        echo mysqli_error($mysqli);
        // Tijdelijk (!) de foutmelding tonen
    }
    mysqli_stmt_close($stmt);
}

// Voeg een link toe terug naar de overzichtspagina
echo "<a href='toonagenda.php' class='btn btn-secondary'>Terug naar overzicht</a>";
?>







