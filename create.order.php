<?php

require 'order.php';
require 'lineItem.php';

/**
 *
  * Generic REST POST endpoint
   *
    * @param   string  URL for the post endpoint
     *          string  json formatted string for the POST request
      * @return  array of POST response
       *
        */
	function postREST($url, $jsonPost)
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

		$response = json_decode($curl_response, true);
										        
		//print_r($response);
											        
		return $response;
	}

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
															        
		return postRest($serviceAPIUrl, $json);
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
			
		$response = postRest($serviceAPIUrl, $json);
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
																								    
		$response = postRest($serviceAPIUrl, $json);
		//print_r($response);
																									        
		return $response;
  	}

?>
