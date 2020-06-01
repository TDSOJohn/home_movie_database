#   add a string which is movie title without whitespaces, punctuation

<?php
    ini_set('display_errors', '1');

#   returns the correct query url, complete with api key
    function return_omdb_query_url($in_string)
    {
        $key = '74a10e01';
        $url = 'http://www.omdbapi.com/?'.'apikey='.$key.'&t='.$in_string;
        echo "$url\n";

        return $url;
    }

#   makes a curl call and returns decoded json content
    function curl_call($in_url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$in_url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $cod_content = curl_exec($ch);
        curl_close($ch);

        $dec_content = json_decode($cod_content);
        var_dump("$dec_content\n");

        return $dec_content;
    }

#   reads a file, attempts to decode with json_decode, returns array of object(stdClass) or FALSE
    function read_from_json($filename)
    {
        echo "reading file...";
        if(file_exists($filename) && filesize($filename))
        {
            $handle = fopen($filename, "r");
            $cod_content = fread($handle, filesize($filename));
            fclose($handle);

            $dec_content = json_decode($cod_content);
            return $dec_content;
        } else
        {
            return "unable to read file, sry \n";
        }
    }

#   decodes array or object(stdClass) and writes string to file
    function write_json_to_file($filename, $dec_content)
    {
        $cod_content = json_encode($dec_content);
        $handle = fopen($filename, "w");
        fwrite($handle, $cod_content);
        fclose($handle);
    }

    $title = $_GET['name'];
    $url = return_omdb_query_url($title);
?>
