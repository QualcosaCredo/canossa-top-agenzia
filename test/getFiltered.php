<?php
include_once "database.php";

$whereClauses = [];

// la fetch di js manda un json 
// $_POST non andava
$data = json_decode(file_get_contents("php://input"), true);


//  $conn->real_escape_string()
//  https://www.php.net/manual/en/mysqli.real-escape-string.php

if (isset($data['tipologia']) && $data['tipologia'] !== "") {
    $filtroTipologia = $conn->real_escape_string($data['tipologia']);
    $whereClauses[] = "tipologia = '$filtroTipologia'";
}

if (isset($data['prezzo']) && $data['prezzo'] > 0) {
    $filtroPrezzo = $data['prezzo'];
    $whereClauses[] = "prezzoRichiesto <= $filtroPrezzo";
}

if (isset($data['quartiere']) && $data['quartiere'] !== "") {
    $filtroQuartiere = $conn->real_escape_string($data['quartiere']);
    $whereClauses[] = "quartiere = '$filtroQuartiere'";
}

if (isset($data['superficie']) && $data['superficie'] > 0) {
    $filtroSuperficie = (int)$data['superficie'];
    $whereClauses[] = "superficie <= $filtroSuperficie";
}

if (isset($data['stato']) && $data['stato'] !== "") {
    $filtroStato = $conn->real_escape_string($data['stato']);
    $whereClauses[] = "stato = '$filtroStato'";
}

if (isset($data['indirizzo']) && $data['indirizzo'] !== "") {
    $filtroIndirizzo = $conn->real_escape_string($data['indirizzo']);
    $whereClauses[] = "indirizzo = '$filtroIndirizzo'";
}

$sql = "SELECT * FROM IMMOBILI";
if (!empty($whereClauses)) {
    $sql .= " WHERE " . implode(" AND ", $whereClauses);
}

$result = $conn->query($sql);

if(!$result){
    $conn -> close();
    die("Fetching from database failed.");
}

$output = array();

while($row = $result->fetch_assoc()){
    array_push($output,json_encode($row));
}

echo json_encode($output);

$conn -> close();
?>