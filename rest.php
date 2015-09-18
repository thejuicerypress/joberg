<?php

/**
 *
 * Generic REST POST endpoint
 *
 * @param   string  URL for the post endpoint
 *          string  json formatted string for the POST request
 * @return  array of POST response
 *
 */
function restPOST($url, $jsonPost)
{
    require 'service.interface.php';
    $curl = curl_init($url);
    $curl_header = [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Bearer '.$authKey
    ];
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_header);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPost);
    
    $curl_response = curl_exec($curl);
    curl_close($curl);

    // $response = json_decode($curl_response, true);
    
    //print_r($response);
    
    return $curl_response;
}

/**
 *
 * Generic REST GET endpoint call
 *
 * @param   string  URL for the post endpoint
 *
 * @return  array of GET response
 *
 */
function restGET($url)
{
    require 'service.interface.php';
    $curl = curl_init($url);
    $curl_header = [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Bearer '.$authKey
    ];

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_header);

    $curl_response = curl_exec($curl);

    curl_close($curl);

    // $response = json_decode($curl_response, true);
    
    // print_r($response);
    
    return $curl_response;
}

?>