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
    
    $itemsJson = restGET($serviceAPIUrl);
    $items = json_decode($itemsJson, true)['elements'];
    return $items;
}

function getItemsCatId($catId) {
    require 'service.interface.php';
    
    $serviceAPIUrl = $serviceUrl . '/categories/'.$catId.'/items';
    $itemsJson = restGET($serviceAPIUrl);

    $items = json_decode($itemsJson, true)['elements'];
    return $items;
}


function getOrderTypes() {
	require 'service.interface.php';
	$serviceAPIUrl = $serviceUrl . '/order_types?expand=categories';
	return restGET($serviceAPIUrl);
}

function getOrderType($id) {
	$orderTypesJson = getOrderTypes();
    $orderTypes = json_decode($orderTypesJson, true);
	$result = array_filter($orderTypes, function ($var) use (&$id) {
        return $var['id'] == $id;
    });
    
    return $result[0];
}

//eg $id = PICK-UP-TYPE
function getCategoriesbyOrderType($typeId) {
    $orderTypesJson = getOrderTypes();
    $orderTypes = json_decode($orderTypesJson, true)['elements'];
    $result = array_filter($orderTypes, function ($var) use (&$typeId) {
        return $var['systemOrderTypeId'] == $typeId;
    });

    $orderType = array_values($result)[0]['categories']['elements'];

    // $categories = $orderType['categories'];

    return $orderType;
}

function getItem($id) {
    require 'service.interface.php';
    $serviceAPIUrl = $serviceUrl . '/items/'.$id;
    // $items = getItems();
    // $result = array_filter($items, function ($var) use (&$id) {
    //     return $var['id'] == $id;
    // });
    
    // return $result[0];

    return restGET($serviceAPIUrl);
}

$cats = getCategoriesbyOrderType('PICK-UP-TYPE');
// var_dump($cats);

foreach ($cats as $key => $value) {
    echo $value['id'].'<br/>';
    echo $value['name'].'<br/>';
    $items = getItemsCatId($value['id']);
    var_dump($items);
    echo '<br/>';
}

// $items = getItems();
// var_dump($items);

// foreach ($items as $key => $value) {
//     echo '<br/>' . $value['id'] . '<br/>';
// }

// $item = getItem('XE9JWHPXBAQR8');

// var_dump(json_encode($item));
?>