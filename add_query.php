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

#   reads a file, attempts to decode with json_decode, returns array of object(stdClass) of FALSE
    function read_from_json($filename)
    {
        if(file_exists($filename))
        {
            $handle = fopen($filename, 'r');
            $cod_content = fread($handle, filesize($filename));
            fclose($handle);

            $dec_content = json_decode($cod_content);
            return $dec_content;
        } else
        {
            return FALSE;
        }
    }

    $title = $_GET['name'];
    $url = return_query_url($title);
    $json_movie_info = curl_call($url);

    var_dump(json_decode($json_movie_info));

    $file = 'movies_database.json';
    $movies_array = read_from_json($file);
    var_dump($movies_array);
?>
