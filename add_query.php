<?php
    echo date('Y-m-d H:i:s');
    $title = $_GET['name'];
    $key = '74a10e01';
    $url = 'http://www.omdbapi.com/t='.$title.'&apikey='.$key+'/';
    echo "\n $url";

    function get_web_page($i_url) {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_USERAGENT      => "test", // name of client
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT        => 120,    // time-out on response
        );

        $ch = curl_init($i_url);
        curl_setopt_array($ch, $options);

        $content  = curl_exec($ch);

        curl_close($ch);

        return $content;
    }

    $response = get_web_page($url);
    echo("\n $response");
    $resArr = array();
    $resArr = json_decode($response);
    echo "<pre>"; print_r($resArr); echo "</pre>";
?>
