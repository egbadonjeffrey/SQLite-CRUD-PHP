<?php

header('Access-Control-Allow-Origin: *');

require_once('./database.php/database.php');
$tableName = 'dairyEntries';
$path = './database.php/database.db';

// createTable($path, "
//     $tableName (id integer primary key, entry)
// ");



$rows = selectFromDatabase($path, "SELECT * FROM $tableName");
$dairyEntries= [];
if(count($rows) > 0) {
    foreach ($rows as $row => $value) {
        array_push($dairyEntries, $value);
    }
    echo json_encode($dairyEntries);
}
