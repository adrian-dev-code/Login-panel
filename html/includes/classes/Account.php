<?php

    class Account {

        private $errorArray ;
        private $con;

        public function __construct($con)
        {
            $this->errorArray = array();
            $this->con=$con;
        }

        public function register($un,$fn,$sn,$em,$em2,$pw,$pw2){
            $this->validateUsername($un);
            $this->validateFirstname($fn);
            $this->validateSecondname($sn);
            $this->validateEmails($em,$em2);
            $this->validatePasswords($pw,$pw2);

            if (empty($this->errorArray)){
                return $this->insertUserDetails($un,$fn,$sn,$em,$pw);
            }
            else{
                return false;
            }
        }

        public function login ($un, $pw){
            return $this->checkDb($un, $pw);
        }

        private function checkDb($un,$pw){
		    $pw = sha1($pw);
		    $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
		    if(mysqli_num_rows($query) == 1) {
		        return true;
		    }
			else {
				array_push($this->errorArray, Constants::$wrongUp);
				return false;
		    }    
        }

		// public function login($un, $pw) {
		// 	$pw = md5($pw);
		// 	$query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password='$pw'");
		// 	if(mysqli_num_rows($query) == 1) {
		// 		return true;
		// 	}
		// 	else {
		// 		array_push($this->errorArray, Constants::$wrongUp);
		// 		return false;
		// 	}
		// }

        private function validateUsername($un){
            if (strlen($un)>25 || strlen($un)<5){
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            $checkUsernameQuery=mysqli_query($this->con, "SELECT username FROM users WHERE username = '$un'");
            if (mysqli_num_rows($checkUsernameQuery)!=0){
                array_push($this->errorArray, Constants::$usernameDuplicate);
                return;
            }
        }
    
        private function validateFirstname($fn){
            if (strlen($fn)>25 || strlen($fn)<2){
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }
    
        private function validateSecondname($sn){
            if (strlen($sn)>25 || strlen($sn)<2){
                array_push($this->errorArray, Constants::$secondNameCharacters);
                return;
            }
        }
    
        private function validateEmails($em,$em2){
            if ($em!=$em2){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }
            if (!filter_var($em,FILTER_VALIDATE_EMAIL))   {
                array_push ($this->errorArray, Constants::$emailInvalid);
                return;
            } 
            //TODO:IF EMAIL ALREDY EXISTS
            $checkEmailQuery = mysqli_query ($this->conn, "SELECT email FROM users WHERE email='$em'");
            if(mysqli_num_rows($checkEmailQuery)!=0){
                array_push($this->errorArray, Constants::$emailDuplicate);
                return;
            }
        }
    
        private function validatePasswords($pw,$pw2){
            if ($pw!=$pw2){
                array_push($this->errorArray, Constants::$passwordDoNotMatch);
                return;
            }  
            if (strlen($pw)>25 || strlen($pw2)<5){
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}
        }

        public function getError ($error){
            if (!in_array($error, $this->errorArray)){
                $error="";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails ($un,$fn,$sn,$em,$pw){
            $encryptedPw=sha1($pw);
            $profilePic="assets/images/profile-pics/no-profile.png";
            $date=date("Y-m-d");
            $result=mysqli_query($this->con, "INSERT into users VALUES ('','$un','$fn','$sn','$em','$encryptedPw','$date','$profilePic')");
            return;
        }

    }

?>