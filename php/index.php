<?php
require('lib.php');
writeHeader();

$servername = "localhost";
$username = "root"; // Modifica se necessario
$password = "root";
$dbname = "agenzia";

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gestione dell'inserimento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipologia = $_POST['tipologia'];
    $prezzorichiesto = $_POST['prezzorichiesto'];
    $superficie = $_POST['superficie'];
    $quartiere = $_POST['quartiere'];
    $indirizzo = $_POST['indirizzo'];
    $datadisponibilita = $_POST['datadisponibilita'];
    $stato = $_POST['stato'];

    echo($prezzorichiesto." ". $superficie." ". $quartiere." ". $indirizzo." ". $datadisponibilita." ". $stato);
    // Preparazione della query
    $stmt = "INSERT INTO Immobili (tipologia, prezzorichiesto, superficie, quartiere, indirizzo, datadisponibilita, stato) VALUES ($tipologia, $prezzorichiesto, $superficie, $quartiere, $indirizzo, $datadisponibilita, $stato)";

    // Esecuzione della query
    if ($conn->query($stmt)) {
        echo "Nuovo immobile aggiunto con successo!";
    }

    
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenzia Immobiliare</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        h2 { color: #333; }
        form {
            display: inline-block;
            text-align: left;
            background: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <h2>Gestione Immobili</h2>

    <!-- Form per aggiungere un immobile -->
    <form method="POST" action="./index.php">
        <label>Tipologia:</label>
        <input type="text" name="tipologia" required><br><br>
        
        <label>Prezzo Richiesto:</label>
        <input type="text" name="prezzorichiesto" required><br><br>
        
        <label>Superficie:</label>
        <input type="number" name="superficie" required><br><br>
        
        <label>Quartiere:</label>
        <input type="text" name="quartiere" required><br><br>
        
        <label>Indirizzo:</label>
        <input type="text" name="indirizzo"><br><br>
        
        <label>Data Disponibilità:</label>
        <input type="date" name="datadisponibilita" required><br><br>
        
        <label>Stato:</label>
        <select name="stato">
            <option value="offerto">Offerto</option>
            <option value="riservato">Riservato</option>
            <option value="venduto">Venduto</option>
        </select><br><br>
        
        <input type="submit" value="Aggiungi Immobile">
    </form>

    <h2>Elenco Immobili</h2>

    <!-- Tabella per visualizzare gli immobili -->
    <table>
        <tr>
            <th>Tipologia</th>
            <th>Prezzo Richiesto</th>
            <th>Superficie</th>
            <th>Quartiere</th>
            <th>Indirizzo</th>
            <th>Stato</th>
            <th>Data Disponibilità</th>
        </tr>

        <?php
        $sql = "SELECT * FROM Immobili";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['tipologia']}</td>
                    <td>€ {$row['prezzorichiesto']}</td>
                    <td>{$row['superficie']} m²</td>
                    <td>{$row['quartiere']}</td>
                    <td>{$row['indirizzo']}</td>
                    <td>{$row['stato']}</td>
                    <td>{$row['datadisponibilita']}</td>
                  </tr>";
        }

        $conn->close();
        ?>
    </table>

</body>
</html>