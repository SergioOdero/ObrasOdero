<?php
    $uri = 'http://api.football-data.org/v2/competitions/PL/matches/?matchday=22';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token:26a6b421548249b59bfbb92e5138c408';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $matches = json_decode($response);
    echo $response;
?>