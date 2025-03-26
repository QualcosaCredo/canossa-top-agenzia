<?php
    require_once "database.php";

    session_start();

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        header("Location: ../php/index.php");
        die();
    }

    $password = (isset($_POST['password'])) ? $_POST['password'] : null;
    $username = (isset($_POST['username'])) ? $_POST['username'] : null;

    $is_admin = (isset($_POST['is_admin'])) ? true : 0; 

    $login_type = (isset($_POST['login_type'])) ? $_POST['login_type'] : null;

    if(!$password || !$username  || !$login_type){
        header("Location: ../php/loginPage.php");
        die();
    }

    $password = md5($password);
    $username = strtoupper($username);

    if($login_type == "Register"){
        $result = $conn->query("SELECT count(*) FROM UTENTE WHERE nome = '$username';");

        if($result > 0){
            $conn->close();
            header("Location: ../php/loginPage.php");
            echo "cè gia un utente con quell' username";
            die();
        }

        $result = $conn->query("INSERT INTO UTENTE(passwd,nome,is_admin) VALUES('$password','$username','$is_admin')");

        if(!$result){
            $conn->close();
            header("Location: ../php/loginPage.php");
            die("Creazione dell' account fallita: ".$conn->error);
        }

    }else if($login_type == "Login"){

        $result = $conn->query("SELECT count(*) AS cnt FROM UTENTE WHERE nome = '$username' AND passwd = '$password'");

        if(!$result || $result->fetch_assoc()['cnt'] == 0){
            $conn->close();
            header("Location: ../php/loginPage.php");
            die();
        }

        $permission = $result->fetch_assoc($result)['is_admin'];
    }

    $conn->close();
    echo "Success";
    $_SESSION['logged'] = true;
    $_SESSION['permission'] = $is_admin;

    header("Location: ../php/index.php");
?>