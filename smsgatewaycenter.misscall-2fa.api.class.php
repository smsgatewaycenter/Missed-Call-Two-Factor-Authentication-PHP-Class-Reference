<?php

/*
  |--------------------------------------------------------------------------
  | SMSGatewayCenter - Class file to Authenticate via Miss Call to SMSGateway.center API
  |--------------------------------------------------------------------------
  |
  | @package  SMSGatewayCenter
  | @version  1.0.0
  | @api     https://www.smsgateway.center/docs/api/
  | @license    <https://www.smsgateway.center> (SMSGatewayCenter)
  | @author   psmpl <psmpl@psmpl.com>
  |
  |
 */

/*
  |--------------------------------------------------------------------------
  | Class for psmpl SMS Gateway Center.
  |--------------------------------------------------------------------------
  |
  |
 */

class psmplSMSGatewayCenter {
    /*
      |--------------------------------------------------------------------------
      | Constant for all API Parameters
      |--------------------------------------------------------------------------
      |
      |
     */

    const MISSCALL2FAAPI = "http://www.smsgateway.center/OTPApi/"; // API End Point
    const PARAM_APIKEY = "apiKey";
    const PARAM_USERID = "userId";
    const PARAM_PASSWORD = "password";
    const PARAM_SEND_METHOD = "sendMethod";
    const PARAM_MOBILE = "mobile";
    const PARAM_MISSCALLTO = "missCallTo";
    const PARAM_CODEEXPIRY = "codeExpiry";
    const PARAM_RETRYEXPIRY = "retryExpiry";
    const PARAM_RENEW = "renew";
    const PARAM_CALLBACK = "callback"; //Capture response http://www.example.com/getMisscallResponse.php
    const PARAM_FORMAT = "format";
    const PARAM_MEDIUM = "medium";

    const FORMAT_JSON = "json";
    const FORMAT_PLAIN = "plain";
    const FORMAT_XML = "xml";

    const METHOD_SEND_GENERATE = "generate";
    const METHOD_SEND_VERIFY = "verify";
    const RETRY_MIN = 180;//Retry minimum time set to 3 minutes (180 seconds)
    const MEDIUM_DEFAULT = "misscall";

    /*
      |--------------------------------------------------------------------------
      | API parameters
      |--------------------------------------------------------------------------
      |
      |
     */

    private $apiKey;
    private $userId;
    private $password;
    private $sendMethod;
    private $mobile;
    private $misscallto;
    private $codeexpiry;
    private $retryexpiry;
    private $renew;
    private $callback;
    private $format;
    private $medium;
    private $response;
    private $param = array();

    /*
      |--------------------------------------------------------------------------
      | Object Instantiation
      |--------------------------------------------------------------------------
      |
      | @param      string  $userid    The userid
      | @param      string  $password  The password
      | @param      string  $apiKey    The api key
      |
     */

    public function __construct($userid, $password, $apiKey = '') {
        $this->userId = $userid;
        $this->password = $password;
        if ($apiKey != '') {
            $this->apiKey = $apiKey;
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Gets the response.
      |--------------------------------------------------------------------------
      |
      | @return     array|mixed  The response.
      |
     */

    function getResponse() {
        return $this->response;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the api key.
      |--------------------------------------------------------------------------
      |
      | @param      null|string  $apiKey  The api key
      |
     */

    function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the user identifier.
      |--------------------------------------------------------------------------
      |
      | @param      string  $userId  The user identifier
      |
     */

    function setUserId($userId) {
        $this->userId = $userId;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the password.
      |--------------------------------------------------------------------------
      |
      | @param      string  $password  The password
      |
     */

    function setPassword($password) {
        $this->password = $password;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the send method.
      |--------------------------------------------------------------------------
      |
      | @param      string  $sendMethod  The send method
      |
     */

    function setSendMethod($sendMethod) {
        $this->sendMethod = $sendMethod;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the Miss Call To.
      |--------------------------------------------------------------------------
      |
      | @param      string  $misscallto    The dedicated miss call number
      |
     */

    function setMissCallTo($misscallto) {
        $this->missCallTo = $misscallto;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the Code Expiry.
      |--------------------------------------------------------------------------
      |
      | @param      <type>  $codeexpiry  The Code Expiry
      |
     */

    function setCodeExpiry($codeexpiry) {
        $this->codeexpiry = $codeexpiry;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the retry Expiry.
      |--------------------------------------------------------------------------
      |
      | @param      <type>  $retryexpiry  The Retry Expiry
      |
     */

    function setRetryExpiry($retryexpiry) {
        $this->$retryexpiry = $retryexpiry;
    }
    
    /*
      |--------------------------------------------------------------------------
      | Sets the Renew param.
      |--------------------------------------------------------------------------
      |
      | @param      <type>  $renew  The Renew
      |
     */

    
    function setRenew($renew) {
        $this->renew = $renew;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the Callback.
      |--------------------------------------------------------------------------
      |
      | @param      <type>  $callback  The Callback
      |
     */

    function setCallback($callback) {
        $this->callback = $callback;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the mobile.
      |--------------------------------------------------------------------------
      |
      | @param      <type>  $mobile  The mobile
      |
     */

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    /*
      |--------------------------------------------------------------------------
      | Sets the format.
      |--------------------------------------------------------------------------
      |
      | @param      string $format  The format
      |
     */

    function setFormat($format) {
        $this->format = $format;
    }
    
    /*
      |--------------------------------------------------------------------------
      | Sets the Medium Default value.
      |--------------------------------------------------------------------------
      |
      | @param      string $mediumdefault  The medium default value
      |
     */

    function setMedium($medium) {
        $this->medium = $medium;
    }
    
    /*
      |--------------------------------------------------------------------------
      | Sends OTP SMS Message
      |--------------------------------------------------------------------------
      |
      | @param      url|string  $api       The api
      | @param      component|string  $sendtype  The sendtype
      |
      | Build all param to send OTP SMS
      |
      |
     */

    public function initiateMissCall($api, $sendtype) {
        $param[psmplSMSGatewayCenter::PARAM_MISSCALLTO] = $this->missCallTo;
        $param[psmplSMSGatewayCenter::PARAM_MOBILE] = $this->mobile;
        $param[psmplSMSGatewayCenter::PARAM_CODEEXPIRY] = $this->codeexpiry;
        $param[psmplSMSGatewayCenter::PARAM_RETRYEXPIRY] = $this->retryexpiry;
        $param[psmplSMSGatewayCenter::PARAM_RENEW] = $this->renew;
        $param[psmplSMSGatewayCenter::PARAM_CALLBACK] = $this->callback;
        $param[psmplSMSGatewayCenter::PARAM_SEND_METHOD] = $this->sendMethod;
        $param[psmplSMSGatewayCenter::PARAM_MEDIUM] = $this->medium;
        $this->baseSGCRequest($api, $sendtype, $param);
    }

    /*
      |--------------------------------------------------------------------------
      | Build basic param
      |--------------------------------------------------------------------------
      |
      | @param      url|string  $api       The api
      | @param      comp|string  $sendtype  The sendtype
      | @param      array|mixed   $param     The parameter
      |
      | @return     array|mixed  ( Gets all basic requested data )
      |
     */

    private function baseSGCRequest($api, $sendtype, $param = array()) {
        $apiEndPoint = $api . $sendtype;
        $param[psmplSMSGatewayCenter::PARAM_USERID] = $this->userId;
        $param[psmplSMSGatewayCenter::PARAM_PASSWORD] = $this->password;
        $param[psmplSMSGatewayCenter::PARAM_FORMAT] = $this->format == "" ? psmplSMSGatewayCenter::FORMAT_PLAIN : $this->format;
        return $this->response = $this->sendRequestDataPostarray($apiEndPoint, $param);
    }

    /*
      |--------------------------------------------------------------------------
      | Sends a request data with post array
      |--------------------------------------------------------------------------
      |
      | @param      url|string  $api       The api
      | @param      comp|string  $sendtype  The sendtype
      | @param      array|mixed   $param     The parameter
      |
      | @throws     Exception
      |
      | @return     boolean    ( returns the curl scraped page response )
      |
     */

    private function sendRequestDataPostarray($apiEndPoint, $param) {
        //echo $apiEndPoint;exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiEndPoint);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
        if ($this->apiKey && $this->apiKey != '') {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:', 'apikey:' . $this->apiKey));
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        $curl_scraped_page = curl_exec($ch);
        $getHTTPCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);
        if ($curl_scraped_page === false) {
            throw new Exception('Unable to connect to SMSGatewayCenter API: ' . $curlError);
        } elseif ($getHTTPCode != 200) {
            throw new Exception('Bad response from SMSGatewayCenter API: HTTP code ' . $getHTTPCode);
        }
        return $curl_scraped_page;
    }

    /*
      |--------------------------------------------------------------------------
      | Send basic API related
      |--------------------------------------------------------------------------
      |
      | @param      url|string  $api       The api
      | @param      comp|string  $sendtype  The sendtype
     */

    public function checkBasic($api, $sendtype) {
        $this->baseSGCRequest($api, $sendtype);
    }

    /*
      |--------------------------------------------------------------------------
      | Sends a record. Common function to use for any API
      |--------------------------------------------------------------------------
      |
      | @param      url|string  $api       The api
      | @param      comp|string  $sendtype  The sendtype
      | @param      array|mixed  $param     The parameter
     */

    public function sendRecord($api, $sendtype, $param) {
        $this->baseSGCRequest($api, $sendtype, $param);
    }

}