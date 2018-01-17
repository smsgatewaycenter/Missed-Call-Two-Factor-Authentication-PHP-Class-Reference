<?php

/**
 * SMSGatewayCenter - Initiate Miss Call Authentication
 *
 * @package  SMSGatewayCenter
 * @version  1.0.0
 * @author   psmpl <psmpl@psmpl.com>
 * @api      <https://www.smsgateway.center/docs/api/>
 * @license  <https://www.smsgateway.center> (SMSGatewayCenter)
*/

include("../smsgatewaycenter.misscall-2fa.api.class.php");

/**
 * Send OTP SMS
 *
 */
$smsgatewaycenter = new psmplSMSGatewayCenter("YourUsername", "YourPassword");//Your username and password
/**
* generateOtp
* $url string APIURL
* $component API URL Component
* $param array array of required fields
*/
$smsgatewaycenter->setMobile("919999999999"); //Your customer's mobile number with country code
$smsgatewaycenter->setMissCallTo('912299999999'); // Your message
$smsgatewaycenter->setCallback('https://www.example.com/getMissCallResponse.php');
$smsgatewaycenter->setSendMethod(psmplSMSGatewayCenter::METHOD_SEND_GENERATE);
$smsgatewaycenter->setMedium(psmplSMSGatewayCenter::MEDIUM_DEFAULT);
$smsgatewaycenter->setRetryExpiry(psmplSMSGatewayCenter::RETRY_MIN);
$smsgatewaycenter->setFormat("json");
$smsgatewaycenter->initiateMissCall(psmplSMSGatewayCenter::MISSCALL2FAAPI,'send');
echo $smsgatewaycenter->getResponse();