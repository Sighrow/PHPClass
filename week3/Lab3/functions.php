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

function createCorpsData($corp, $email, $zipcode, $owner, $phone)
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

function deleteFromCorps($id)
{
    $isDeleted = false;
    
    $db = getDatabase();
    $stmt = $db->prepare("DELETE FROM corps where id = :id");
    
    $binds = array(
        ":id" => $id
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
    $isDeleted = true;
    } 
    
    return $isDeleted;
}

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function updateCorpsRow($id, $corp, $email, $zipcode, $owner, $phone)
{
   $result = false;
   
   $db = getDatabase(); 
   
   $stmt = $db->prepare("UPDATE corps set corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":corp" => $corp,
                    ":email" => $email,
                    ":zipcode" => $zipcode,
                    ":owner" => $owner,
                    ":phone" => $phone
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = true;
                }
    return $result;
}