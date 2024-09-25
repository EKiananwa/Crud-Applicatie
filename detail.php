<?php
// Voeg de database-verbinding toe
require 'config.php';

// Lees de ID uit de URL
$id = $_GET['ID'];

// Maak de query om de gegevens van het item op te halen
$query = "SELECT * FROM crud_agenda WHERE ID = " . $id;

// Voer de query uit en vang het resultaat op
$result = mysqli_query($mysqli, $query);

// Controleer of er een record is gevonden
if ($result && mysqli_num_rows($result) > 0) {
    // Haal de gegevens van het item op
    $item = mysqli_fetch_assoc($result);

    // Toon de gegevens van het item
    echo '<div class="details-container">';
    echo '<p><strong>  Identification Number:          </strong>             ' . $id . '</p>';
    echo '<p><strong>  Subject:                        </strong>             ' . $item['Onderwerp'] . '</p>';
    echo '<p><strong>  Content:                        </strong>             ' . $item['Inhoud'] . '</p>';
    echo '<p><strong>  Beginning Date:                 </strong>             ' . $item['Begindatum'] . '</p>';
    echo '<p><strong>  Termination Date:               </strong>             ' . $item['Einddatum'] . '</p>';
    echo '<p><strong>  Urgency:                        </strong>             ' . $item['Prioriteit'] . '</p>';
    echo '<p><strong>  Condition:                      </strong>             ' . $item['Status'] . '</p>';

    // Terug naar de overzicht knop
    echo '<div class="button-container">';
    echo '<a class="overview-link" href="toonagenda.php">Back to Overview</a>';
    echo '</div>';

    echo '</div>'; // Sluit details-container
} else {
    // Als er geen record is gevonden
    echo "<p>No record found with ID: <strong>$id</strong>.</p>";
}

// Sluit de database-verbinding
mysqli_close($mysqli);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Item Details</title>
    <!-- Add your stylesheets or other head content here -->

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .details-container {
        width: 70%;
        max-width: 600px;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
        box-sizing: border-box;
        transition: transform 0.2s ease-in-out;
    }

    .details-container:hover {
        transform: scale(1.05);
    }

    h1 {
        font-size: 24px;
        color: #333333;
        margin-bottom: 10px;
    }

    p {
        font-size: 16px;
        color: #555555;
        margin: 10px 0;
    }

    .important {
        font-weight: bold;
        color: #e44d26;
    }

    .button-container {
        margin-top: 20px;
        text-align: center;
    }

    .overview-link {
        display: inline-block;
        text-decoration: none;
        padding: 12px 24px;
        background-color: #3498db;
        color: #ffffff;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .overview-link:hover {
        background-color: #2980b9;
    }

    /* Media Query for Responsive Design */
    @media only screen and (max-width: 600px) {
        .details-container {
            width: 90%;
        }
    }
</style>


</head>
<body>

</body>
</html>
