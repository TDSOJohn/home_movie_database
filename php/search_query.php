<?php
    echo "Name: " . $_GET['name'] . ", by " . $_GET['director'];

    include 'json_functions.php';

    $db_filename = 'data/movies_db.json';
    $movies_db = read_from_json($db_filename);

    echo $movies_db;
#   $movies_db = json_decode($movies_db);
    $dec_movies_db = json_decode($movies_db);
    var_dump($dec_movies_db);

    echo($dec_movies_db->Title);
