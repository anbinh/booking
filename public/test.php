<?php

$gatewayurl = "https://api.checkout.com/Process/gateway.aspx";
$post_string = '<?xml version="1.0" encoding="ISO-8859-1"?>';
$post_string .= '<request>';
$post_string .= '<account_identifier></account_identifier>';
$post_string .= '<merchantid>CKODUBAPITEST</merchantid>';
$post_string .= '<password>Password1!</password>';
$post_string .= '<action>3</action>';
$post_string .= '<trackid>1122-001</trackid>';
$post_string .= '<transid>40356555</transid>';
$post_string .= '<bill_currencycode>USD</bill_currencycode>';
$post_string .= '<bill_cardholder>SOME NAME</bill_cardholder>';
$post_string .= '<bill_cc_type>CC</bill_cc_type>';
$post_string .= '<bill_cc_brand>VISA</bill_cc_brand>';
$post_string .= '<bill_cc>4543474002249996</bill_cc>';
$post_string .= '<bill_expmonth>06</bill_expmonth>';
$post_string .= '<bill_expyear>2017</bill_expyear>';
$post_string .= '<bill_cvv2>956</bill_cvv2>';
$post_string .= '<bill_address>Billing Address</bill_address>';
$post_string .= '<bill_address2>Billing Address 2</bill_address2>';
$post_string .= '<bill_postal>Billing Postal</bill_postal>';
$post_string .= '<bill_city>Billing city</bill_city>';
$post_string .= '<bill_state>Billing state</bill_state>';
$post_string .= '<bill_email>omkar61422@gmail.com</bill_email>';
$post_string .= '<bill_country>USA</bill_country>';
$post_string .= '<bill_amount>1.00</bill_amount>';
$post_string .= '<bill_phone>44-12312331312</bill_phone>';
$post_string .= '<bill_fax>44-12312331312</bill_fax>';
$post_string .= '<bill_customerip>123.123.123.200</bill_customerip>';
$post_string .= '<bill_merchantip>192.168.33.10</bill_merchantip>';
$post_string .= '<ship_address>Shipping address</ship_address>';
$post_string .= '<ship_email>email@shipping.com</ship_email>';
$post_string .= '<ship_postal>Shipping Postal Code</ship_postal>';
$post_string .= '<ship_address2>Shipping Address 2</ship_address2>';
$post_string .= '<ship_type>FEDEX</ship_type>';
$post_string .= '<ship_city>Shipping City</ship_city>';
$post_string .= '<ship_state>Shipping State</ship_state>';
$post_string .= '<ship_phone>44-12312331312</ship_phone>';
$post_string .= '<ship_country>USA</ship_country>';
$post_string .= '<ship_fax>44-12312331312</ship_fax>';
$post_string .= '<udf1></udf1>';
$post_string .= '<udf2></udf2>';
$post_string .= '<udf3></udf3>';
$post_string .= '<udf4></udf4>';
$post_string .= '<udf5></udf5>';
$post_string .= '<merchantcustomerid>21</merchantcustomerid>';
$post_string .= '<product_desc>booking</product_desc>';
$post_string .= '<product_quantity>1</product_quantity>';
$post_string .= '<product_unitcost>1</product_unitcost>';
$post_string .= '</request>';

$header  = "POST HTTP/1.0 \r\n";
$header .= "Content-type: text/xml \r\n";
$header .= "Content-length: ".strlen($post_string)." \r\n";
$header .= "Content-transfer-encoding: text \r\n";
$header .= "Connection: close \r\n\r\n";
$header .= $post_string;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $gatewayurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$data = curl_exec($ch);

echo "<pre>";
print_r($data);
echo "</pre>";
 echo $data;

if(curl_errno($ch))
    print curl_error($ch);
else
    curl_close($ch);

?>