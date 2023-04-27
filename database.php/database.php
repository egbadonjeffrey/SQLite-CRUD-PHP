<?php

if(!class_exists('database')) {
    class database extends  SQLite3 {
        function __construct($path) {
            $this->open($path);
        }
    } 
}

// Create table

function createTable($path, $tableData) {

    //Open database 
    $db = new database($path);

    // if database does not exist throw error
    if(!$db) {
        echo 'ERROR: Database does not exist';
        exit();
    }

    // if exist create sql table and input table data
    $sql = "CREATE TABLE " . $tableData . ";";
    $response = $db->exec($sql);
    if($response == false) {
        echo 'ERROR! Table creation failed';
        die();
    } else {
        echo "Sql : " . $sql . " \n has been run successfully";
    }


}


function insertIntoDatabase($path, $sql) {
    
    $db = new database($path);
    if(!$db) {
        echo "ERROR Database does not exist";
        exit();
    }

    $response = $db->exec($sql);
    if($response == false) {
        echo "ERROR Insert Statement Failed";
        die();
    } else {
        echo "Sql : " . $sql . " \n has been run successfully";
    }
}

function deleteFromDatabase($path, $sql) {
    
    $db = new database($path);
    if(!$db) {
        echo "ERROR Database does not exist";
        exit();
    }

    $response = $db->exec($sql);
    if($response == false) {
        echo "ERROR Delete Statement Failed";
        die();
    } else {
        echo "Sql : " . $sql . " \n has been run successfully";
    }
}


function selectFromDatabase($path, $sql) {
    $db = new database($path);

    if(!$db) {
        echo "ERROR Database does not exist";
        exit();
    }

    $response = $db->query($sql);
    if($response == false) {
        echo "ERROR Select failed";
        die();
    }

    $data = [];
    while ($row = $response->fetchArray(SQLITE3_ASSOC))
        array_push($data, $row);
    return $data;
}