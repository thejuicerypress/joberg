<?php

require_once 'order.php';
//require_once 'lineItem.php';
require_once 'rest.php';
require_once 'inventory.php';
require_once 'line.item.php';

/**
 *
 * Creates a new order
 *
 * @param   Order   $orderRequest jsonserializable object to create a new
 *                  order with
 * @return  array of POST response
 *
 */
function createOrder($orderRequestObject)
{
    require 'service.interface.php';
    $serviceAPIUrl = $serviceUrl.'/orders';

    $json = json_encode($orderRequestObject);
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
function addItemToOrder($orderId, $newLineItemId)
{
    require 'service.interface.php';
    $serviceAPIUrl = $serviceUrl.'/orders/'.$orderId.'/line_items';
    // $itemJson = getItem($newLineItemId);
    // $lineItem = new LineItem($itemJson);
    // $lineItemJson = json_encode($lineItem);
    $lineItemJson = '{"item": {"id": "'.$newLineItemId.'"}}';
    $response = restPOST($serviceAPIUrl, $lineItemJson);
    
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
function openOrder($orderId)
{
    require 'service.interface.php';
    $serviceAPIUrl = $serviceUrl.'/orders/'.$orderId;
    // $total = 500;

    $lineItemsUrl = $serviceAPIUrl.'/line_items';
    $lineItemsJson = restGET($lineItemsUrl);
    $lineItemsObject = json_decode($lineItemsJson, true);

    $total = 0;
    foreach ($lineItemsObject['elements'] as $key => $value) {
        $total = $total + $value['price'];
    }

    $json = '{"total": "'.$total.'","state": "open"}';
    
    $response = restPOST($serviceAPIUrl, $json);
    
    return $response;
}

?>