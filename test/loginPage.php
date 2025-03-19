<?php
    session_start();

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        header("./index.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        
        label,input{
            margin-bottom: 1rem;
            font-family: "Arial";
            font-size: 32px;
        }

        .centered-div{
            align-items: center;
            align-content: center;

            margin: auto;

            height: fit-content;
            width :fit-content;

            height: 100%;
        }

        input{
            background-color: rgb(255,255,255);
            border: solid;
            border-color: rgb(130,130,130);
            border-width: 1px;
            border-radius: 0.5rem;
        }

        input[type="submit"]{
            background-color: rgb(12, 108, 253);
            color: rgb(255,255,255)
        }

        input[type="submit"]:hover{
            background-color: rgb(6, 73, 173);
            color: rgb(255,255,255)
        }

        </style>
</head>
<body>
    <div class = "centered-div">
        <form method = "POST" action ="./processLogin.php">
            <label for = "username">  Username: </label><br>
            <input type = "text" name = username></input><br>
            <label for = "password">  Password: </label><br>

            <input type = "password" name = "password"></input><br>

            <input type = "submit" name = "login-type" value = "Login"></input><br>
            <input type = "submit" name = "login-type" value = "Register"></input>
        </form> 
    </div>
</body>
</html>
