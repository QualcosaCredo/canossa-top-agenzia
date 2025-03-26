<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codice = $_POST['codice'];
    $stato = $_POST['stato'];

    $sql = "UPDATE IMMOBILI SET stato = '$stato' WHERE CodiceImmobile = '$codice'";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Stato aggiornato con successo!";
    } else {
        echo "❌ Errore: " . $conn->error;
    }
}

$conn->close();
?>