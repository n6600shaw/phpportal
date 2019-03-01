<?php

session_start();

$sessionString = $_POST['sessionString'];

$sessionArray = json_decode($sessionString);

foreach($sessionArray as $key => $value){

    //if value is empty unset the session variable
    $_SESSION[$key] = $value;
    
}

