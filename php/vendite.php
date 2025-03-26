<?php include '../include/database.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <title>Registra Vendita</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        form { display: inline-block; text-align: left; background: #f4f4f4; padding: 20px; border-radius: 5px; }
        label, select, input { display: block; margin: 10px 0; width: 100%; padding: 5px; }
        input[type="submit"] { background: #28a745; color: white; border: none; padding: 10px; cursor: pointer; }
        input[type="submit"]:hover { background: #218838; }
        a { display: block; margin-top: 20px; padding: 10px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div id = "navbar"><a href="../include/logout.php">Logout</a></div>

    <h2>Registra una Vendita</h2>
    <form method="POST">
        <label>Seleziona Immobile:</label>
        <select name="immobile" required>
            <?php
            $sql = "SELECT CodiceImmobile, tipologia, prezzorichiesto FROM IMMOBILI WHERE stato = 'Disponibile'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['CodiceImmobile']}'>{$row['tipologia']} - {$row['prezzorichiesto']} €</option>";
            }
            ?>
        </select>

        <label>Seleziona Acquirente:</label>
        <select name="acquirente" required>
            <?php
            $sql = "SELECT CodiceAcquirente, nome, cognome FROM ACQUIRENTE";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['CodiceAcquirente']}'>{$row['nome']} {$row['cognome']}</option>";
            }
            ?>
        </select>

        <label>Prezzo Vendita:</label>
        <input type="number" name="prezzo_vendita" required>

        <label>Provvigione (%):</label>
        <input type="number" name="provvigione" required>

        <label>Data Vendita:</label>
        <input type="date" name="data_vendita" required>

        <input type="submit" value="Registra Vendita">
    </form>

    <a href="index.php">🔙 Torna all'Indice</a>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codice_acquirente = $_POST['acquirente'];
        $codice_immobile = $_POST['immobile'];
        $prezzo_vendita = $_POST['prezzo_vendita'];
        $provvigione = $_POST['provvigione'];
        $data_vendita = $_POST['data_vendita'];

        $sql = "INSERT INTO VENDITE (prezzovendita, datavendita, provvigione, CodiceAcquirente, CodiceImmobile)
                VALUES ('$prezzo_vendita', '$data_vendita', '$provvigione', '$codice_acquirente', '$codice_immobile')";

        if ($conn->query($sql) === TRUE) {
            $conn->query("UPDATE IMMOBILI SET stato = 'Venduto' WHERE CodiceImmobile = '$codice_immobile'");
            echo "<p>✅ Vendita registrata con successo!</p>";
        } else {
            echo "<p>❌ Errore: " . $conn->error . "</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>