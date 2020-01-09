<?php

    session_start();
    if (isset($_SESSION['userLoggedIn'])){
            
    }
    else {
        header('Location:register.php');
    }  
   
?>
<html>

<head>
<title>Slotify | Muzica de toate felurile</title>
<link rel = "stylesheet" href = "style/style.css" type= "text/css">
</head>

<body>

    <p>Hello <?php echo $_SESSION['userLoggedIn'] ?></p>

</body>



</html>