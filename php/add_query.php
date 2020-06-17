
<?php
#   add a string which is movie title without whitespaces, punctuation

    ini_set('display_errors', '1');

    include 'omdb_functions.php';
    include 'json_functions.php';

    $title = $_GET['name'];
    $url = return_omdb_query_url($title);
    $query_data = curl_call($url);

    var_dump($query_data);

    foreach($query_data->Search as $item)
    {
        echo $item->Title;
    }

    $file = '../data/movies_db.json';
    write_to_file($file, $query_data);


?>
