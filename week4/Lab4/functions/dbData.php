<?php

function getAllCorpsData(){
       
        $db = dbconnect();

        $stmt = $db->prepare("SELECT * FROM corps");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    return $results;
}

function searchCorps($columnSearch, $search)
{
        $db = dbconnect();
           
        $stmt = $db->prepare("SELECT * FROM corps WHERE $columnSearch LIKE :search");

        $search = '%'.$search.'%';
        $binds = array(
            ":search" => $search
        );
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    return $results;
}

function orderCorps($columnOrder, $order)
{
        $db = dbconnect();

        $stmt = $db->prepare("SELECT * FROM corps ORDER BY $columnOrder $order");

        $results = array();
         if ($stmt->execute() && $stmt->rowCount() > 0) 
         {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }

    return $results;
}