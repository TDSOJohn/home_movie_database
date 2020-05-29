<?php
    echo date('Y-m-d H:i:s');
    $title = $_GET['name'];
    $key = '74a10e01';
    $url = 'http://www.omdbapi.com/t='.$title.'&apikey='.$key;
    echo "\n $url";

    function get_web_page($i_url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url");

        $content  = curl_exec($ch);
        echo "\n $content";
        curl_close($ch);

        return $content;
    }

    $response = get_web_page($url);
    echo("\n $response");
    $resArr = array();
    $resArr = json_decode($response);
    echo "<pre>"; print_r($resArr); echo "</pre>";
?>
