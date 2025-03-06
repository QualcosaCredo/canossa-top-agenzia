<?php 

if(isset($_REQUEST['immobile'])) $sc = $_REQUEST['immobile']; else $sc = null;
require('../include/lib.php');
writeHeader();
writeMenu();
switch($sc){
    case "listaimmobile":{
        echo('Lista dei immobili');
        $sql = "SELECT p.descrizione, m.nome, m.citta, m.provincia, a.dataAcquisto, a.quantita, a.prezzo 
                FROM prodotto AS p, magazzino AS m, acquisto AS a 
                WHERE p.id=a.idProdotto AND m.id=a.idMagazzino";
        break;
    }

?>