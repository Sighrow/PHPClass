<?php

function signUp($email, $password){
    
          $db = dbconnect();

        $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");

        $password = sha1($password);
        
        $binds = array(
            ":email" => $email,
            ":password" => $password
        );
        
        $results = false;
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
             $results = true;
         }
         return $results;
}
?>
