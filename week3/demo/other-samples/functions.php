<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}


/**
 * Deletes a new row from the Test table.
 *    
 * @return Boolean
 */
function deleteFromTest($id)
{
    $isDeleted = false;
    
    $db = getDatabase();
    $stmt = $db->prepare("DELETE FROM test where id = :id");
    
    $binds = array(
        ":id" => $id
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
    $isDeleted = true;
    } 
    
    return $isDeleted;
}

function viewAllFromTest()
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM test");
    
      $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function viewOneFromTest($id)
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM test where id = :id");
    
    $binds = array(
            ":id" => $id
    );
    
      $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function updateTestRow($id, $dataone, $datatwo)
{
   $result = false;
   
   $db = getDatabase(); 
   
   $stmt = $db->prepare("UPDATE test set dataone = :dataone, datatwo = :datatwo where id = :id");
                
                $binds = array(
                    ":id" => $id,
                    ":dataone" => $dataone,
                    ":datatwo" => $datatwo
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = true;
                }
    return $result;
}