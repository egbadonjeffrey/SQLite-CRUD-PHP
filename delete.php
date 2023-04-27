<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');

require_once('./database.php/database.php');
$tableName = 'dairyEntries';
$path = './database.php/database.db';

if ($_POST['id']) {
    $id = intval($_POST['id']);
    deleteFromDatabase($path, '
        DELETE FROM ' .$tableName . ' WHERE id= ' . $id . ';
    ');
}