<?php

function viewAllFromCorps()
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM corps");
    
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

function createCorpsData($corp, $incorp_dt, $email, $zipcode, $owner, $phone)
{
    $result = false;
    
    $db = getDatabase();
    
    $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
    
    $binds = array(
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
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