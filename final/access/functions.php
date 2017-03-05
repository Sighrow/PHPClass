<?php

function isLoggedIn() {
    
    if ( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false 
            ) {
            return false;
        }
        return true;
}

function showUsername(){
    
    $db = dbconnect();

    $userid = $_SESSION['userid'];
    
    $username = $db->prepare("SELECT username FROM users WHERE user_id = $userid");

    return username;
}