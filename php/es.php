<?php
// Connessione al database
$servername = "localhost:82";
$username = "root"; // Modifica se necessario
$password = "root";
$dbname = "agenzia";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Gestione dell'inserimento di un nuovo immobile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codice = $_POST['codice'];
    $indirizzo = $_POST['indirizzo'];
    $prezzo = $_POST['prezzo'];
    $superficie = $_POST['superficie'];
    $quartiere = $_POST['quartiere'];
    $stato = $_POST['stato'];
    $data_disponibilita = $_POST['data_disponibilita'];

    $sql = "INSERT INTO Immobili (codice, indirizzo, prezzo, superficie,quartiere, stato, data_disponibilita) 
            VALUES ('$codice', '$indirizzo', '$prezzo', '$superficie', '$quartiere', '$stato', '$data_disponibilita')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Immobile aggiunto con successo!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Errore: " . $conn->error . "</p>";
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
    <form method="POST">
        <label>Codice:</label>
        <input type="text" name="codice" required><br><br>
        
        <label>Indirizzo:</label>
        <input type="text" name="indirizzo" required><br><br>
        
        <label>Prezzo:</label>
        <input type="number" name="prezzo" required><br><br>
        
        <label>Superficie (m²):</label>
        <input type="number" name="superficie" required><br><br>
        
        
        <label>Quartiere:</label>
        <input type="text" name="quartiere" required><br><br>
        
        <label>Stato:</label>
        <select name="stato">
            <option value="offerto">Offerto</option>
            <option value="riservato">Riservato</option>
            <option value="venduto">Venduto</option>
        </select><br><br>
        
        <label>Data Disponibilità:</label>
        <input type="date" name="data_disponibilita"><br><br>
        
        <input type="submit" value="Aggiungi Immobile">
    </form>

    <h2>Elenco Immobili</h2>

    <!-- Tabella per visualizzare gli immobili -->
    <table>
        <tr>
            <th>Codice</th>
            <th>Indirizzo</th>
            <th>Prezzo</th>
            <th>Superficie</th>
            <th>Quartiere</th>
            <th>Stato</th>
            <th>Data Disponibilità</th>
        </tr>

        <?php
        $sql = "SELECT * FROM Immobili";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['codice']}</td>
                    <td>{$row['indirizzo']}</td>
                    <td>€ {$row['prezzo']}</td>
                    <td>{$row['superficie']} m²</td>
                    <td>{$row['classe_energetica']}</td>
                    <td>{$row['quartiere']}</td>
                    <td>{$row['stato']}</td>
                    <td>{$row['data_disponibilita']}</td>
                  </tr>";
        }
        ?>
    </table>

</body>
</html>