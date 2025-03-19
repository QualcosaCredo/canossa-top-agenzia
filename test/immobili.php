<?php include_once "database.php";
    session_start();

   /*if(isset($_SESSION["logged"]) && $_SESSION["logged"] == false){
        header('Location: loginPage.php');
        die("not logged in");        
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #filter-div{
            align-items: center;
            align-content: center;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
            width :fit-content;
        }

        .filter-selector{
            position: relative;
            box-shadow: 0px 0px 2px;
            background-color: white;
            border-width: 3px;
            border-color: rgb(100, 100, 100);
            border-style: solid;
            border-radius: 20px;
            text-overflow: ellipsis;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            margin: auto;
        }
        .default-filter-text{
            color: rgb(180, 180, 180);
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        select { padding: 5px; }
        a { display: inline-block; margin-top: 20px; padding: 10px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px; }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div id = "filter-div">
        <select name="tipologia" class="filter-selector" id="filtroTipologia"> 
            <option class="default-filter-text" selected></option> 
            <?php
            echo "hello";
                $result = $conn->query("SELECT tipologia FROM IMMOBILI GROUP BY tipologia");
                if(!$result){
                    die();
                }

                while($row = $result->fetch_assoc()){   
                    $tipologia = $row['tipologia'];
                    echo "<option value='$tipologia'><a href='./index.php'>$tipologia</a></option>";
                }
            ?>
        </select>

        <select name="quartiere" class="filter-selector" id="filtroQuartiere"> 
            <option class="default-filter-text" selected></option> 
            <?php
                $result = $conn->query("SELECT quartiere FROM IMMOBILI GROUP BY quartiere");
                if(!$result){
                    die();
                }
                
                while($row = $result->fetch_assoc()){   
                    $quartiere = $row['quartiere'];
                    echo "<option value='$quartiere'>$quartiere</option>";
                }
                ?>
        </select>
        
        <input type = "text" name="prezzo" placeholder = "prezzo" class="filter-selector" id="filtroPrezzo"></input>

        <input type = "text" name="superficie" placeholder = "superficie m²" class="filter-selector" id="filtroSuperficie"> </input>

        <select name="stato" class="filter-selector" id="filtroStato"> 
            <option class="default-filter-text" selected></option> 
            <option value='Disponibile' >Disponibile</option>
            <option value='Venduto' >Venduto</option>
            <option value='Riservato' >Riservato</option>
        </select>
    </div>
    <?php $conn->close() ?>
    <div id = "view-immobili">
    </div>
</body>
<script src = "./filtri.js" ></script>
</html>