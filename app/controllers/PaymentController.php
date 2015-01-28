<?php

class PaymentController extends BaseController {

	public $gatewayurl = "https://api.checkout.com/Process/gateway.aspx";
	public $merchantid = "CKODUBAPITEST";
	public $password = "Password1!";

	public function purchaseBooking(){

		$input = Input::all();
		$body = $this->generatePurchaseBodyRequest(
			$this->merchantid,
			$this->password,
			$input['track_id'],
			$input['currencycode'],
			$input['cardholder_name'],
			'cc',
			$input['cc_brand'],
			$input['bill_cc'],
			$input['expmoth'],
			$input['expyear'],
			$input['cvv2'],
			$input['bill_amount']
		);

		$header  = "POST HTTP/1.0 \r\n";
		$header .= "Content-type: text/xml \r\n";
		$header .= "Content-length: ".strlen($body)." \r\n";
		$header .= "Content-transfer-encoding: text \r\n";
		$header .= "Connection: close \r\n\r\n";
		$header .= $body;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, $this->gatewayurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		$data = curl_exec($ch);

		$xml_obj = simplexml_load_string($data);

		$response_tranid = $xml_obj->tranid;
		$response_authcode = $xml_obj->authcode;
		$reponse_customer_token = $xml_obj->customer_token;

		if($xml_obj->result == 'Successful' && $xml_obj->responsecode == '0'){
			$payment = new PaymentHistory;
			$payment->user_id = Auth::user()->id;
			$payment->card_number = $input['bill_cc'];
			$payment->cvv2 = $input['cvv2'];
			$payment->track_id = $input['track_id'];
			$payment->currencycode = $input['currencycode'];
			$payment->cardholder_name = $input['cardholder_name'];
			$payment->cc_brand = $input['cc_brand'];
			$payment->expmoth = $input['expmoth'];
			$payment->expyear = $input['expyear'];
			$payment->bill_amount = $input['bill_amount'];

			$payment->tranid =   $response_tranid;
			$payment->authcode = $response_authcode;
			$payment->customertoken = $reponse_customer_token;

			if($payment->save()){
				return Response::json(array(
					'error' => false,
					'response' => 200),
					200
				);
			}
		}
		return Response::json(array(
			'error' => $xml_obj->error_text . $xml_obj->result,
			'response' => 200),
			200
		);
	}

//	public function parseXML($string){
//		$string = '<response type="valid" service="token">
//						<result>Successful</result>
//						<responsecode>0</responsecode>
//						<cvv2response>X</cvv2response>
//						<tranid>40359370</tranid>
//						<authcode>450663</authcode>
//						<trackid>111</trackid>
//						<merchantid>CKODUBAPITEST</merchantid>
//						<customer_token>03d3d22f-9423-4127-a6eb-2222c0ca785f</customer_token>
//					</response>';
//		$xml_obj = simplexml_load_string($string);
//		$response_result = $xml_obj->result;
//		$response_responsecode = $xml_obj->responsecode;
//		$response_tranid = $xml_obj->tranid;
//		$response_authcode = $xml_obj->authcode;
//		$reponse_customer_token = $xml_obj->customer_token;
//
//	}

	public function voidPurchaseBooking($id){
		$payment = PaymentHistory::find($id);

		$body = $this->generateVoidPurchaseBodyRequest(
			$this->merchantid,
			$this->password,
			$payment['track_id'],
			'USD',
			$payment['cardholder_name'],
			'cc',
			$payment['cc_brand'],
			$payment['card_number'],
			$payment['expmoth'],
			$payment['expyear'],
			$payment['cvv2'],
			$payment['bill_amount'],
			$payment['tranid']
		);

		$header  = "POST HTTP/1.0 \r\n";
		$header .= "Content-type: text/xml \r\n";
		$header .= "Content-length: ".strlen($body)." \r\n";
		$header .= "Content-transfer-encoding: text \r\n";
		$header .= "Connection: close \r\n\r\n";
		$header .= $body;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL, $this->gatewayurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close'));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$data = curl_exec($ch);
		$xml_obj = simplexml_load_string($data);
		$response_tranid = $xml_obj->tranid;
		$response_authcode = $xml_obj->authcode;
		$reponse_customer_token = $xml_obj->customer_token;

		if($xml_obj->result == 'Successful' && $xml_obj->responsecode == '0'){
			return Response::json(array(
				'error' => false,
				'response' => 200),
				200
			);
		}
		return Response::json(array(
			'error' => $data,
			'response' => 200),
			200
		);
	}


	public function generateVoidPurchaseBodyRequest($merchantid, $password, $track_id,
													$currencycode, $cardholder_name,
												$ccType, $cc_brand, $bill_cc, $expmonth,
												$expyear, $cvv2, $bill_amount, $transid){
		$post_string = '<?xml version="1.0" encoding="ISO-8859-1"?>';
		$post_string .= '<request>';
		$post_string .= '<account_identifier></account_identifier>';
		$post_string .= "<merchantid>$merchantid</merchantid>";
		$post_string .= "<password>$password</password>";
		$post_string .= '<action>3</action>';
		$post_string .= "<trackid>$track_id</trackid>";
		$post_string .= "<transid>$transid</transid>";
		$post_string .= "<bill_currencycode>$currencycode</bill_currencycode>";
		$post_string .= "<bill_cardholder>$cardholder_name</bill_cardholder>";
		$post_string .= '<bill_cc_type>CC</bill_cc_type>';
		$post_string .= "<bill_cc_brand>$cc_brand</bill_cc_brand>";
		$post_string .= "<bill_cc>$bill_cc</bill_cc>";
		$post_string .= "<bill_expmonth>$expmonth</bill_expmonth>";
		$post_string .= "<bill_expyear>$expyear</bill_expyear>";
		$post_string .= "<bill_cvv2>$cvv2</bill_cvv2>";
		$post_string .= '<bill_address>Billing Address</bill_address>';
		$post_string .= '<bill_address2>Billing Address 2</bill_address2>';
		$post_string .= '<bill_postal>Billing Postal</bill_postal>';
		$post_string .= '<bill_city>Billing city</bill_city>';
		$post_string .= '<bill_state>Billing state</bill_state>';
		$post_string .= '<bill_email>test@gmail.com</bill_email>';
		$post_string .= '<bill_country>USA</bill_country>';
		$post_string .= "<bill_amount>$bill_amount</bill_amount>";
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
		$post_string .= '<merchantcustomerid></merchantcustomerid>';
		$post_string .= '<product_desc></product_desc>';
		$post_string .= '<product_quantity></product_quantity>';
		$post_string .= '<product_unitcost></product_unitcost>';
		$post_string .= '</request>';
		return $post_string;
	}

	public function generatePurchaseBodyRequest($merchantid, $password, $track_id, $currencycode, $cardholder_name,
	$ccType, $cc_brand, $bill_cc, $expmonth, $expyear, $cvv2, $bill_amount){
		$post_string = '<?xml version="1.0" encoding="ISO-8859-1"?>';
		$post_string .= '<request>';
		$post_string .= '<account_identifier></account_identifier>';
		$post_string .= "<merchantid>$merchantid</merchantid>";
		$post_string .= "<password>$password</password>";
		$post_string .= '<action>1</action>';
		$post_string .= "<trackid>$track_id</trackid>";
		$post_string .= "<bill_currencycode>$currencycode</bill_currencycode>";
		$post_string .= "<bill_cardholder>$cardholder_name</bill_cardholder>";
		$post_string .= '<bill_cc_type>CC</bill_cc_type>';
		$post_string .= "<bill_cc_brand>$cc_brand</bill_cc_brand>";
		$post_string .= "<bill_cc>$bill_cc</bill_cc>";
		$post_string .= "<bill_expmonth>$expmonth</bill_expmonth>";
		$post_string .= "<bill_expyear>$expyear</bill_expyear>";
		$post_string .= "<bill_cvv2>$cvv2</bill_cvv2>";
		$post_string .= '<bill_address>Billing Address</bill_address>';
		$post_string .= '<bill_address2>Billing Address 2</bill_address2>';
		$post_string .= '<bill_postal>Billing Postal</bill_postal>';
		$post_string .= '<bill_city>Billing city</bill_city>';
		$post_string .= '<bill_state>Billing state</bill_state>';
		$post_string .= '<bill_email>test@gmail.com</bill_email>';
		$post_string .= '<bill_country>USA</bill_country>';
		$post_string .= "<bill_amount>$bill_amount</bill_amount>";
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
		$post_string .= '<merchantcustomerid></merchantcustomerid>';
		$post_string .= '<product_desc></product_desc>';
		$post_string .= '<product_quantity></product_quantity>';
		$post_string .= '<product_unitcost></product_unitcost>';
		$post_string .= '</request>';
		return $post_string;
	}
}