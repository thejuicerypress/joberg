<?php

require 'create.order.php';

//create order request
$order = new Order();
$order->note = 'order note';
$order->title = 'order title';
$order->taxRemoved = false;
$order->orderTypeId = 'AKK5DXMJCBPSW';

$newOrder = createOrder($order);

//create a line items
$lineItem = new LineItem();
$lineItem->id = 'XE9JWHPXBAQR8';
$lineItem->price = '9';

//add line item to order
addItemToOrder($newOrder, $lineItem);

//open order
$orderStatus = openOrder($newOrder);

print_r($orderStatus);

?>
