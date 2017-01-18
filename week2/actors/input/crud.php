<?php

/**
 * Adds a new row to the Actors table.
 * 
 * @return Array
 */  
function createActorsData($firstname, $lastname, $dob, $height)
{
    $result = false;
    
    $db = getDatabase();
    
    $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");
    
    $binds = array(
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
            );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $result = true;
            }
    
    return $result;
}


/**
 * Gets all data from Actors table.
 * 
 * @return Array
 */  
function viewAllFromActors()
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM actors");
    
     $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}