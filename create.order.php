<?php

require_once 'order.php';
//require_once 'lineItem.php';
require_once 'rest.php';

/**
 *
 * Creates a new order
 *
 * @param   Order   $orderRequest jsonserializable object to create a new
 *                  order with
 * @return  array of POST response
 *
 */
function createOrder($orderRequest)
{
    require 'service.interface.php';
    $serviceAPIUrl = $serviceUrl.'/orders';

    $json = json_encode($orderRequest);
    //echo $json."<br/><br/>";
    
    return restPOST($serviceAPIUrl, $json);
}

/**
 *
 * Adds a new item to an order
 *
 * @param   array   Existing order to add new line items to.
 *                  formatted via the Order json schema.
 *          LineItem    Line item to add to the given order
 * @return  array of POST response
 *
 */
function addItemToOrder($order, $newLineItem)
{
    $serviceAPIUrl = $order['href'].'/line_items';
    
    $json = json_encode($newLineItem);
    //echo $json."<br/><br/>";
    
    $response = restPOST($serviceAPIUrl, $newLineItem);
    //print_r($response);
    
    return $response;
}

/**
 *
 * Opens the given existing order
 *
 * @param   array   existing order to open
 * @return  array of POST response
 *
 */
function openOrder($order)
{
    $serviceAPIUrl = $order['href'];
    $json = '{"state": "open"}';
    
    $response = restPOST($serviceAPIUrl, $json);
    //print_r($response);
    
    return $response;
}

?>