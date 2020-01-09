<?php
    include ('includes/config.php');
    include ('includes/classes/Account.php');
    include ('includes/classes/Constants.php');
    $account = new Account($con);    
    include ('includes/handlers/register-handler.php');
    include ('includes/handlers/login-handler.php');


    // function getInputValue($argument){
    //     if (isset($_POST[$argument])){
    //          echo $_POST[$argument]; 
    //     }
    //     return;
    // }

?>

<html>

<head> 
<title>Slotify</title>

<link rel = "stylesheet" href = "style/style.css" type= "text/css">
<script src="includes/scripts/particles.js"></script>

</head>

<body>
    <div id = "particles-js"> </div>
            <script>
                /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
                particlesJS.load('particles-js', 'assets/particles.json', function() {
                    console.log('callback - particles-js config loaded');
                });
            </script>
        <div id ="panel">
                <!-- LOGIN FIELD -->
                <form id = "loginForm" action="register.php" method="POST">
                    <h2> Conecteaza-te </h2>
                    <p> 
                        <?php echo $account->getError(Constants::$wrongUp);?>
                        <label for ="loginUsername"> Nume de utilizator </label> <br>
                        <input id ="loginUsername" name = "loginUsername" type="text" placeholder= "Nume de utilizator" required> 
                    </p>
                    <p>
                        <label for = "loginPassword">Parola</label><br>
                        <input id ="loginPassword" name= "loginPassword" type ="password"  placeholder = "Introduceti parola" required> 
                    </p>
                    <button  class="buttoncon" type = "submit" name="loginButton"></button>
                </form>

                <!-- REGISTER FIELD -->
                <form id = "registerForm" action = "register.php" method="POST">
                    <h2> Inregistreaza-te pe platforma </h2>
                    <p> 
                        <?php echo $account->getError(Constants::$usernameCharacters);?>
                        <?php echo $account->getError(Constants::$usernameDuplicate);?>
                        <label for = "username">Nume de utilizator</label><br>
                        <input id = "username" name="username" type = "text" placeholder="Introduceti numele de utilizator" value ="" required >
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters);?>
                        <label for = "firstName">Nume</label><br>
                        <input id = "firstName" name="firstname" type="text" placeholder="Nume" required> 
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$secondNameCharacters);?>
                        <label for = "secondName">Prenume</label><br>
                        <input id = "secondName" name = "secondname" type = "text" placeholder ="Prenume" required>
                    </p>
                    <p>
                    <?php echo $account->getError(Constants::$emailInvalid);?>
                        <label for = "enterEmail">E-mail </label><br>
                        <input id ="enterEmail" name="enterEmail" type="email" placeholder= "email@myemail.com" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailInvalid);?>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch);?>
                        <?php echo $account->getError(Constants::$emailDuplicate);?>
                        <label for = "confirmEmail">Confirma-ti email-ul</label><br>
                        <input id = "confirmEmail" name="confirmEmail" type ="email" placeholder = "email@myemail.com" required>
                    </p>
                    <p>  
                    <?php echo $account->getError(Constants::$passwordCharacters);?>
                    <?php echo $account->getError(Constants::$passwordDoNotMatch);?>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric);?>
                    <label for = "registerPassword">Parola</label><br>
                    <input id ="registerPassword" name="registerPassword" type = "password"  placeholder = "Introduceti parola" required >
                    </p>
                    <p>
                        <label for = "registerPassword2">Confirma parola</label><br>
                        <input id="registerPassword2" name="registerPassword2" type="password" placeholder ="Reintroduceti parola" required >
                    </p>
                    <button type = "submit" class="buttoncon" name = "registerButton"></button> 
                </form>
            </div>
    </div>
</body>

</html>