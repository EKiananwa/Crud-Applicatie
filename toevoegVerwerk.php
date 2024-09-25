<?php
include 'config.php';

if (isset($_POST['verzend'])) {
    $ond = $_POST['onderwerpVeld'];
    $inh = $_POST['inhoudVeld'];
    $begin = $_POST['begindatumVeld'];
    $eind = $_POST['einddatumVeld'];
    $prior = $_POST['prioriteitVeld'];
    $stat = $_POST['statusVeld'];

    $query = "INSERT INTO crud_agenda (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
    $query .= " VALUES ('{$ond}', '{$inh}', '{$begin}', '{$eind}', {$prior}, '{$stat}')";

    $result = mysqli_query($mysqli, $query);


    if ($result) {
        echo "Het item is toegevoegd<br/>";
    } else {
        echo "FOUT bij toevoegen<br/>";
        echo $query . "<br/>";
        echo mysqli_error($mysqli);
    }

    echo "<a href='toonagenda.php'>OVERZICHT</a>";
}
?>