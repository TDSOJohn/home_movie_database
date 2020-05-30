<?php
    ini_set('display_errors', '1');

    $jsonobj = '{"Title":"Blade Runner","Year":"1982","Rated":"R","Released":"25 Jun 1982","Runtime":"117 min","Genre":"Action, Sci-Fi, Thriller","Director":"Ridley Scott","Writer":"Hampton Fancher (screenplay), David Webb Peoples (screenplay), Philip K. Dick (novel)","Actors":"Harrison Ford, Rutger Hauer, Sean Young, Edward James Olmos","Plot":"A blade runner must pursue and terminate four replicants who stole a ship in space, and have returned to Earth to find their creator.","Language":"English, German, Cantonese, Japanese, Hungarian, Arabic","Country":"USA","Awards":"Nominated for 2 Oscars. Another 12 wins & 16 nominations.","Poster":"https://m.media-amazon.com/images/M/MV5BNzQzMzJhZTEtOWM4NS00MTdhLTg0YjgtMjM4MDRkZjUwZDBlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg","Ratings":[{"Source":"Internet Movie Database","Value":"8.1/10"},{"Source":"Rotten Tomatoes","Value":"90%"},{"Source":"Metacritic","Value":"84/100"}],"Metascore":"84","imdbRating":"8.1","imdbVotes":"668,423","imdbID":"tt0083658","Type":"movie","DVD":"N/A","BoxOffice":"N/A","Production":"N/A","Website":"N/A","Response":"True"}';
    var_dump(json_decode($jsonobj));

#    var_dump($_SERVER);
    $title = $_GET['name'];
    $key = '74a10e01';
    $url = 'http://www.omdbapi.com/?'.'apikey='.$key.'&t='.$title;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url");
    $response = curl_exec($ch);
    curl_close($ch);

    echo "\n $response";
    var_dump(json_decode($response));

    ob_start();
    var_dump($decoded_response);
    var_dump(json_decode($response, true));
    $result = ob_get_clean();
    echo "\n $result";

?>
