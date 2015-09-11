<?php

 require_once 'nusoap/nusoap.php';
  
 $URL       = "http://localhost/test/new_soap/server.php";
 $namespace = $URL . '?wsdl';

 $server    = new soap_server();
 $server->configureWSDL('API Server' );

 function testRequest($id){
  return  array('Success' => 'kishore', 'Response' => array('key' => 'eee', 'value' =>  'id'));
 }

  
 $server->register(
        'testRequest', 
        array(  
              'appid' => 'xsd:string',
                
               'apptype' => 'xsd:string'  
         ),
        array('return'=> 'tns:applicationResponse' ),
        $namespace, 
	'', 
	'Simple Hello World Method');

 $server->wsdl->addComplexType(   
   	 'applicationResponse',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array( 
        'Success' => array('name' => 'Success', 'type' => 'xsd:string'),
        'Response' => array('name' => 'Response', 'type' => 'tns:Response')
        )
    );

 $server->wsdl->addComplexType(   
   	 'Response',
   	 'complexType',
   	 'struct',
   	 'all',
  	  '',
	array( 
        'key' => array('name' => 'key', 'type' => 'xsd:string'),
        'value' => array('name' => 'value', 'type' => 'xsd:string')
        )
    );

 $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
 $server->service($HTTP_RAW_POST_DATA);


 $time = rand(0,1100);
  $myfile = fopen("files/".$time.".xml", "w") or die("Unable to open file!");
  $txt = $HTTP_RAW_POST_DATA;
  fwrite($myfile, $txt);
  fclose($myfile);
  exit;
