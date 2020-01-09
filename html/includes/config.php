<?php
//    session_start();
    $timezone=date_default_timezone_set("Europe/Bucharest");
    $con=mysqli_connect('localhost','phpmyadmin','ideeapad530s','slotify');
    if(mysqli_connect_errno()){
       echo "Nu s-a putut realiza conexiunea cu baza de date ". mysqli_connect_errno();
    }
	error_reporting(0);

?>