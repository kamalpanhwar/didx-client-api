<?php

/** Please note this will purchased channels
 * if channels availabel on the number.
 * you have to discuss with sale how channel work
 * to buy this link
 * User channel based listing and take number and buy channels
 * Return is in String Gotcha of Array
 *
 * These simple script for people who getting problem in using didx.net as they were not willing to 
 * updated their api, so I have provide this to public as they may help. It also transfer data in json
 * =============================================================
 * Provide to help people to use it for creating application
 * developed by Kamal uddin Panhwar http://www.kamalpanhwar.com  kamalpanhwar@gmail.com
 * =============================================================
 */

require_once dirname(__FILE__) . "/config.php";
require_once dirname(__FILE__). "/latestlib/nusoap.php";

$DIDNumber = "__YOURDIDNUMBER__";
$SIPorIAX = $DIDNumber . "@supertec.com";
$Flag = "1";
$ChannelID = "88";
$ChannelQuantity = "2";

$parameters = array($user, $password, $DIDNumber, $SIPorIAX, $Flag);
$soapclient = new nusoap_client("http://api.didx.net/webservice/WebBuyDIDServer.php");
$SoapResult = array();
$SoapResult = $soapclient->call("BuyDIDByNumber",$parameters,"urn:BuyDIDByNumber");

echo "<h3>Json Data</h3>\n\n<br>";


$json = json_encode($SoapResult, JSON_PRETTY_PRINT);
echo $json;


echo "<h3>Tabular Data</h3>\n\n<br>";



$data_title = "<h2>Available DIDS for countries</h2>";

$data_heading_tag = "";

for($i = 0;$i<count($SoapResult[0]); $i++){
$data_heading_tag .= "<td><strong>" . $SoapResult[0][$i] . "</strong></td>";

}

$row_data = "";
for($i = 1;$i<count($SoapResult);$i++)
{
		$row_data .= "<tr>";
	for($a = 0;$a<count($SoapResult[0]); $a++){
		$row_data .= "	<td>".$SoapResult[$i][$a]."</td>";

	}
	$row_data .= "</tr>";
}


echo create_table();

?>


?>
