 <?php
  ini_set("soap.wsdl_cache_enabled", 0);
  $client = new SoapClient('http://localhost/test/new_soap/server.php?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE) );

   //print_r($client->__getFunctions()); 
 
   print_R($response = $client->__soapCall("testRequest", array('id' => 'abhi', 'value' => 'jeeth')));
 // print_R($api->__getLastRequest());
