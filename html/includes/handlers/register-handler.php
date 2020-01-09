<?php

    session_start();
    
    function checkPassword($inputText){
        $inputText=htmlspecialchars($inputText);
        return $inputText;
    }

    function modifyUsername ($inputText){
        $inputText=htmlspecialchars($inputText);
        $inputText=str_replace(" ", "", $inputText);
        return $inputText;
    }

    function modifyString ($inputText){
        $inputText=htmlspecialchars($inputText);
        $inputText=str_replace(" ", "", $inputText);
        $inputText=ucfirst(strtolower($inputText));
        return $inputText;
    }

    function modifyString2 ($inputText){
        $inputText=htmlspecialchars($inputText);
        $inputText=str_replace(" ", "", $inputText);
        return $inputText;
    }

    if(isset($_POST['registerButton'])){
        //USERNAME CHECK
        $username = modifyUsername($_POST['username']);
        //FIRSTNAME CHECK
        $firstname = modifyString($_POST['firstname']);
        //SECONDNAME CHECK
        $secondname = modifyString($_POST['secondname']);
        //EMAIL CHECK
        $email = modifyString2($_POST['enterEmail']);
        //EMAIL CHECK(2)
        $email2 = modifyString2($_POST['confirmEmail']);
        //PASSWORD CHECK()
        $pass = checkPassword($_POST['registerPassword']);
        //PASSWORD CHECK
        $pass2 = checkPassword($_POST['registerPassword2']);

        $wasSuccesful=$account -> register($username,$firstname,$secondname,$email,$email2,$pass,$pass2);

        if ($wasSuccesful){
            header("Location: index.php");
        }
    }
?>