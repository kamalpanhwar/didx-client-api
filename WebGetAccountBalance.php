<?php
/*
 * These simple script for people who getting problem in using didx.net as they were not willing to 
 * updated their api, so I have provide this to public as they may help. It also transfer data in json
 * =============================================================
 * Provide to help people to use it for creating application
 * developed by Kamal uddin Panhwar http://www.kamalpanhwar.com  kamalpanhwar@gmail.com
 * =============================================================
 */
 

require_once dirname(__FILE__) . "/config.php";
require_once dirname(__FILE__). "/latestlib/nusoap.php";

$parameters = array($user, $password);
$soapclient = new nusoap_client("http://api.didx.net/webservice/WebGetAccountBalanceWSDL.php");
$SoapResult = array();
$SoapResult = $soapclient->call("WebGetAccountBalance",$parameters,"urn:WebGetAccountBalance");

echo "<h3>Json Data</h3>\n\n<br>";


$json = json_encode($SoapResult, JSON_PRETTY_PRINT);
echo $json;



?>
 
 

