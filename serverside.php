<?php
    echo date('Y-m-d H:i:s');
    $title = 'blade+runner';
    $key = '74a10e01';
    $url = 'http://www.omdbapi.com/t='.$title.'&apikey='.$key;
    echo "\n $url";

    $data = curl($url);
    echo "\n $data";
?>
