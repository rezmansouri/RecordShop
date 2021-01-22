<?php

require_once "../../src/Album.php";

$albumName = $_GET['name'];
$artistName = $_GET['artist'];

$album = new Album();
$album->setName($albumName);
$album->setArtist($artistName);

$connection = pg_connect("host=localhost port=5432 dbname=record_shop user=postgres password=123");

$query = "INSERT INTO albums (name, artist) VALUES ($1, $2) RETURNING id";
$params = [
    $album->getName(),
    $album->getArtist()
];

$insertResult = pg_query_params(
    $connection,
    $query,
    $params
);

if ($insertResult === FALSE) {
    echo pg_last_error($connection);
    die();
}

$insertRow = pg_fetch_row($insertResult);
$albumId = $insertRow[0];

echo "<h1>Created Album with ID " . $albumId . "</h1>";