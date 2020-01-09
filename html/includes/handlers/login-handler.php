<?php

    session_start();

    $login = 0;

    if (isset($_POST['loginButton'])){
        $un = $_POST['loginUsername'];
        $pw = $_POST['loginPassword'];
        $login = $account->login($un,$pw);
    }

    if ($login){
        $_SESSION['userLoggedIn']=$_POST['loginUsername'];
        header("Location:index.php");
    }
?>