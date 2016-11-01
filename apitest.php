<?php
$url = "http://www.xchangewith.me/api/v2/api/User/login?email=xchangewithme1@gmail.com&password=Pentagon1";
                $ch = curl_init();

       curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
                'Transfer-Encoding: chunked',
                'Accept: application/json',
                'Content-type: application/json',
                'Expect:  '
    ) );
        $response = curl_exec($ch);
       echo $response;

?>