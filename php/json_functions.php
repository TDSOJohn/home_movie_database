<?php
#   makes a curl call and returns page content as php objects
    function curl_call($in_url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$in_url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $content = curl_exec($ch);
        curl_close($ch);

        $decoded_content = json_decode($content);

        return $decoded_content;
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
    function write_to_file($filename, $data_in)
    {
        $handle = fopen($filename, "w");
        $encoded_data = json_encode($data_in);
        fwrite($handle, $encoded_data);
        fclose($handle);
    }
