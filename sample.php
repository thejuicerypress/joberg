<?php

require_once 'create.order.php';
require_once 'inventory.php';

//create order request
$order = new Order();
$order->note = 'order note';
$order->title = 'order title';
$order->taxRemoved = false;
$order->orderTypeId = 'AKK5DXMJCBPSW';

$newOrder = createOrder($order);

//create a line items
// $lineItem = new LineItem();
// $lineItem->id = 'XE9JWHPXBAQR8';

$item = getItem('XE9JWHPXBAQR8');

var_dump($item);

//add line item to order
addItemToOrder($newOrder, $item);

//open order
$orderStatus = openOrder($newOrder);

echo '<br/><br/>';
var_dump($orderStatus);

?>