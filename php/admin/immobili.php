<?php include 'database.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestione Immobili</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        select { padding: 5px; }
        a { display: inline-block; margin-top: 20px; padding: 10px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background: #0056b3; }
    </style>
    <script>
        function aggiornaStato(codice, stato) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "aggiorna_stato.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Mostra la risposta dal server
                }
            };
            xhr.send("codice=" + codice + "&stato=" + stato);
        }
    </script>
</head>
<body>
    <h2>Lista Immobili</h2>
    <table>
        <tr>
            <th>Tipologia</th>
            <th>Prezzo Richiesto</th>
            <th>Superficie (mq)</th>
            <th>Quartiere</th>
            <th>Indirizzo</th>
            <th>Data Disponibilità</th>
            <th>Stato</th> <!-- Colonna modificabile -->
        </tr>
        <?php
        $sql = "SELECT CodiceImmobile, tipologia, prezzorichiesto, superficie, quartiere, indirizzo, datadisponibilita, stato 
                FROM IMMOBILI";
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
                    <td>
                        <select onchange='aggiornaStato({$row['CodiceImmobile']}, this.value)'>
                            <option value='Disponibile' " . ($row['stato'] == 'Disponibile' ? 'selected' : '') . ">Disponibile</option>
                            <option value='Venduto' " . ($row['stato'] == 'Venduto' ? 'selected' : '') . ">Venduto</option>
                            <option value='Riservato' " . ($row['stato'] == 'Riservato' ? 'selected' : '') . ">Riservato</option>
                        </select>
                    </td>
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
