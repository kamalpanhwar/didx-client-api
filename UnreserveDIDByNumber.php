<?php
/** you must have resrved number to use this APi please coordinate with sales
 * A reserved number mean add to cart also
 * You can buy number
 * than release
 * than unreserve
 */

require_once dirname(__FILE__) . "/config.php";
require_once dirname(__FILE__). "/latestlib/nusoap.php";

$DIDNumber = "__DIDNUMBER__";

$parameters = array($UserID, $Password, $DIDNumber);
$soapclient = new nusoap_client("http://api.didx.net/webservice/WebReserveDIDServer.php");
$SoapResult = array();
$SoapResult = $soapclient->call("UnreserveDIDByNumber",$parameters,"urn:UnreserveDIDByNumber");

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
