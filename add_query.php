<?php

ini_set('display_errors', '1');
#    var_dump($_SERVER);
    $title = $_GET['name'];
    $key = '74a10e01';
    $url = 'http://www.omdbapi.com/?'.'apikey='.$key.'&t='.$title;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url");
    $response = curl_exec($ch);
    curl_close($ch);

    echo "\n $response";
    $decoded_response = json_decode($response);

    $a = array(1, 2, array("a", "b", "c"));
    var_dump($a);

    ob_start();
    var_dump($decoded_response);
    var_dump(json_decode($response, true));
    $result = ob_get_clean();
    echo "\n $result";

?>
