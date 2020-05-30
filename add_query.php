<?php
    ini_set('display_errors', '1');

    $title = $_GET['name'];
    $key = '74a10e01';
    $url = 'http://www.omdbapi.com/?'.'apikey='.$key.'&t='.$title;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    curl_close($ch);

    var_dump(json_decode($response));
?>

# load HTML from a file
