<?php
    // questa roba possiamo anche non metterla se vuoi

    //non ho provato se header() funziona cosi

    require_once "database.php";

    session_start();

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        header("./index.php");
        die();
    }

    $password = (isset($_POST['password'])) ? $_POST['password'] : null;
    $username = (isset($_POST['username'])) ? $_POST['username'] : null;

    $login_type = (isset($_POST['login-type'])) ? $_POST['login-type'] : null;

    if(!password || !username || !login_type){
        header("./loginPage.php");
        die();
    }

    $password = md5($password);
    $username = strtoupper($username);

    if($login_type == "Register"){
        $result = $conn->query("SELECT count(*) from UTENTI WHERE username = $username;");

        if($result > 0){
            $conn->close();
            echo "cè gia un utente con quell' username";
            die();
        }

        $result = $conn->query("INSERT INTO UTENTI(passwd,username) VALUES($password,$username)");

        if(!$result){
            $conn->close();
            die("Creazione dell' account fallita");
        }

    }else if($login_type == "Login"){
        $result = $conn->query("SELECT username,passwd from UTENTI WHERE username = $username AND passwd = $password");

        if(!result){
            $conn->close();
            die("Login fallito");
        }
    }

    $conn->close();
    
    $_SESSION['logged'] = true;
?>