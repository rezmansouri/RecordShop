<?php

use Doctrine\ORM\ORMException;

require_once "../../bootstrap.php";
require_once "../../src/Album.php";

$albumName = $_GET['name'];
$artistName = $_GET['artist'];

$album = new Album();
$album->setName($albumName);
$album->setArtist($artistName);

try {
    $entityManager->persist($album);
    $entityManager->flush();
} catch (ORMException $exception) {
    echo $exception->getMessage();
    die();
}

echo "<h1>Created Album with ID " . $album->getId() . "</h1>";