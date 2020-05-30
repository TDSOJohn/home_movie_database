<?php
    ini_set('display_errors', '1');

#   returns the correct query url, complete with api key
    function return_query_url($in_string)
    {
        $key = '74a10e01';
        $url = 'http://www.omdbapi.com/?'.'apikey='.$key.'&t='.$in_string;
        return $url;
    }

    function curl_call($in_url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$in_url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $out_data = curl_exec($ch);
        curl_close($ch);

        return $out_data;
    }

    $title = $_GET['name'];
    $url = return_query_url($title);
    $json_movie_info = curl_call($url);

    var_dump(json_decode($json_movie_info));

    $file = 'movies_database.json';
?>
