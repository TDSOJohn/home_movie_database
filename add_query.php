<?php
    $title = $_GET['name'];
    $key = '74a10e01';
    $url = 'http://www.omdbapi.com/?'.'apikey='.$key.'&t='.$title;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url");

    $response = curl_exec($ch);
    echo "\n $response";
    curl_close($ch);
    var_dump(json_decode($response));
    var_dump(json_decode($response, true));
?>
