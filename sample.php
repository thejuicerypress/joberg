<?php

require_once 'create.order.php';
require_once 'inventory.php';

//create order request
$order = new Order();
$order->note = 'order note';
$order->title = 'order title';
$order->taxRemoved = false;
$order->orderTypeId = 'AKK5DXMJCBPSW';

$newOrderJson = createOrder($order);
$newOrder = json_decode($newOrderJson, true);
$newOrderId = $newOrder['id'];
//create a line items
// $lineItem = new LineItem();
// $lineItem->id = 'XE9JWHPXBAQR8';

$item = 'XE9JWHPXBAQR8';
$item2 = 'PV8DGZRJ2H3ZT';

//add line item to order
$response = addItemToOrder($newOrderId, $item);
$response = addItemToOrder($newOrderId, $item2);

//open order
$orderStatus = checkoutOrder($newOrderId);

echo '<br/><br/>';
var_dump($orderStatus);

?>