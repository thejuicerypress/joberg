<?php
require_once 'rest.php';

/**
 *
 * Generic REST GET endpoint call
 *
 * @param   string  URL for the post endpoint
 *
 * @return  array of GET response
 *
 */
function getItems() {
    require 'service.interface.php';
    
    $serviceAPIUrl = $serviceUrl . '/items';
    
    $items = restGET($serviceAPIUrl);
    return $items['elements'];
}

function getOrderTypes() {
	require 'service.interface.php';
	$serviceAPIUrl = $serviceUrl . '/order_types';
	return restGET($serviceAPIUrl);
}

function getOrderType($id) {
	$orderTypes = getOrderTypes();
	$result = array_filter($orderTypes, function ($var) use (&$id) {
        return $var['id'] == $id;
    });
    
    return $result[0];
}

function getItem($id) {
    $items = getItems();
    $result = array_filter($items, function ($var) use (&$id) {
        return $var['id'] == $id;
    });
    
    return $result[0];
}

// $items = getItems();

// print_r($items);

// foreach ($items as $key => $value) {
//     echo '<br/>' . $value['id'] . '<br/>';
// }

// $item = getItem('XE9JWHPXBAQR8');

// var_dump(json_encode($item));
?>