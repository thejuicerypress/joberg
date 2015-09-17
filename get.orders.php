<?php

require 'service.interface.php';
require 'rest.php';
    
$serviceAPIUrl = $serviceUrl.'/orders';

$orders = restGET($serviceAPIUrl);

?>
