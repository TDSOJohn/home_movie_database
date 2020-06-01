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

#   makes a curl call and returns page content as string
    function curl_call($in_url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$in_url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $content = curl_exec($ch);
        curl_close($ch);

        echo $content;

        return $content;
    }

#   reads a file, attempts to decode with json_decode, returns array of object(stdClass) or FALSE
    function read_from_json($filename)
    {
        echo "reading file...";
        if(file_exists($filename) && filesize($filename))
        {
            $handle = fopen($filename, "r");
            $content = fread($handle, filesize($filename));
            fclose($handle);

            return $content;
        } else
        {
            return "unable to read file, sry \n";
        }
    }

#   writes string to file $filename
    function write_to_file($filename, $string)
    {
        $handle = fopen($filename, "w");
        fwrite($handle, $string);
        fclose($handle);
    }

    $title = $_GET['name'];
    $url = return_omdb_query_url($title);
    $query_string_data = curl_call($url);

    $file = 'movies_database.json';
    write_to_file($file, $query_string_data);
?>

var_dump($curl_json_data));

$file = 'movies_database.json';
$movies_db = read_from_json($file);

write_json_to_file($file, $curl_json_data);
var_dump($movies_db);
