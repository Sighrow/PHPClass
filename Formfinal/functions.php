<?php

function viewAllFromAccount()
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM account");
    
      $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function viewOneFromCorps($id)
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM corps where id = :id");
    
    $binds = array(
            ":id" => $id
    );
    
      $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function createAccountData($email, $phone, $heard_from, $contact_via, $comments)
{
    $result = false;
    
    $db = dbconnect();
    
    $stmt = $db->prepare("INSERT INTO account SET email = :email, phone = :phone, heard = :heard_from, contact = :contact_via, comments = :comments");
    
    $binds = array(
                ":email" => $email,
                ":phone" => $phone,
                ":heard_from" => $heard_from,
                ":contact_via" => $contact_via,
                ":comments" => $comments
            );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $result = true;
            }
    
    return $result;
}

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function userExist($email) {
    
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM account WHERE email = :email");

    $binds = array(
        ":email" => $email
    );

    $results = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    return $results;
}