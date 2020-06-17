
<?php
#   add a string which is movie title without whitespaces, punctuation

    ini_set('display_errors', '1');

    include 'omdb_functions.php';
    include 'json_functions.php';

    $title = $_GET['name'];
    $url = return_omdb_query_url($title);
    $query_data = curl_call($url);

    $file = '../data/movies_db.json';
#    write_to_file($file, $query_data);


?>

var_dump($curl_json_data));

$file = 'movies_database.json';
$movies_db = read_from_json($file);

write_json_to_file($file, $curl_json_data);
var_dump($movies_db);
