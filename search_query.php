<?php
    echo "Name: " . $_GET['name'] . ", by " . $_GET['director'];

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

    $db_filename = 'movies_db.json';
    $movies_db = read_from_json($db_filename);

    $dec_movies_db = json_decode($movies_db);
    var_dump($dec_movies_db);

    echo($dec_movies_db->Title);
?>


#   searchs for
    function search_json_by_name($dec_content, $search, $name)
    {
        foreach($dec_content->Title as $item)
        {
            echo "$item";
            if($item == $search)
            {
                return TRUE;
            }
        }
        return FALSE;
    }
