<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: *');

require_once('./database.php/database.php');
$tableName = 'dairyEntries';
$path = './database.php/database.db';

if ($_POST['entry']) {
    $entry = ($_POST['entry']);
    insertIntoDatabase($path, '
    INSERT INTO ' . $tableName . '(entry) VALUES("' . $entry . '");
    ');
}