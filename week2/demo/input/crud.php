<?php

/**
 * Adds a new row to the Test table.
 * 
 * @return Array
 */  
function createTestData($dataone, $datatwo)
{
    $result = false;
    
    $db = getDatabase();
    
    $stmt = $db->prepare("INSERT INTO test SET dataone = :dataone, datatwo = :datatwo");
    
    $binds = array(
                ":dataone" => $dataone,
                ":datatwo" => $datatwo
            );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $result = true;
            }
    
    return $result;
}


/**
 * Gets all data from Test table.
 * 
 * @return Array
 */  
function viewAllFromTest()
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM test");
    
     $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}