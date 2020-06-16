<?php
#   returns the correct query url, complete with api key
    function return_omdb_query_url($in_string)
    {
        $key = '74a10e01';
        $url = 'http://www.omdbapi.com/?'.'apikey='.$key.'&s='.$in_string;
        echo "$url\n";

        return $url;
    }
