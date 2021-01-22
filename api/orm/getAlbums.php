<?php

require_once "../../bootstrap.php";
require_once "../../src/Album.php";

$albumRepository = $entityManager->getRepository('Album');
$albums = $albumRepository->findAll();
/* SELECT * FROM albums; */

foreach ($albums as $album) {
    echo '<h3>';
    echo $album->getName() . " - " . $album->getArtist();
    echo '</h3>';
    echo '</hr>';
}