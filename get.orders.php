<?php

require 'service.interface.php';
    
    $serviceAPIUrl = $serviceUrl.'/orders';

    $curl = curl_init($serviceAPIUrl);
    $curl_header = ['Authorization: Bearer '.$authKey];

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_header);

    $curl_response = curl_exec($curl);

    curl_close($curl);

    echo $curl_response;
        
?>
