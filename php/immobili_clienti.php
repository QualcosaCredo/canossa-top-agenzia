<?php include 'database.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista Immobili - Cliente</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { display: inline-block; margin-top: 20px; padding: 10px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Lista Immobili Disponibili</h2>
    <table>
        <tr>
            <th>Tipologia</th>
            <th>Prezzo Richiesto</th>
            <th>Superficie (mq)</th>
            <th>Quartiere</th>
            <th>Indirizzo</th>
            <th>Data Disponibilità</th>
            <th>Stato</th>
        </tr>
        <?php
        $sql = "SELECT tipologia, prezzorichiesto, superficie, quartiere, indirizzo, datadisponibilita, stato FROM IMMOBILI";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['tipologia']}</td>
                    <td>{$row['prezzorichiesto']} €</td>
                    <td>{$row['superficie']}</td>
                    <td>{$row['quartiere']}</td>
                    <td>{$row['indirizzo']}</td>
                    <td>{$row['datadisponibilita']}</td>
                    <td>{$row['stato']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Nessun immobile disponibile</td></tr>";
        }
        ?>
    </table>
    <a href="index.php">🔙 Torna all'Indice</a>
</body>
</html>

<?php $conn->close(); ?>
