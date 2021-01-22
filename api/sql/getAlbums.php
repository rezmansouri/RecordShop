<?php

require_once "../../src/Album.php";

$connection = pg_connect("host=localhost port=5432 dbname=record_shop user=postgres password=123");

$query = "SELECT name, artist from albums";
$selectResult = pg_query($connection, $query);

if ($selectResult === FALSE) {
    echo pg_last_error($connection);
    die();
}

while ($selectRow = pg_fetch_row($selectResult)) {
    echo '<h3>';
    echo $selectRow[0] . "\t-\t" . $selectRow[1];
    echo '</h3>';
    echo '</hr>';
}