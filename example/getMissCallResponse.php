<?php
//Save this file as getMissCallResponse.php
$oMC2fa = new misscall2facallback($_REQUEST);

echo $oMC2fa->getMobile();
echo $oMC2fa->getCreateTime();
echo $oMC2fa->getExpiryTime();
echo $oMC2fa->getRetryAfter();
echo $oMC2fa->getMissCallTo();
echo $oMC2fa->getType();
echo $oMC2fa->getMethod();
echo $oMC2fa->getStatus();
echo $oMC2fa->getReason();

    //or write to a file
    $content = $oMC2fa->getMobile().", ".$oMC2fa->getMissCallTo()."\r\n";
    $fp = fopen('misscallresponse.csv', 'a');
    fwrite($fp, $content);
    fclose($fp);
    
    //or write to database
    $sgc_db_username = 'yourdatabaseusername';
    $sgc_db_password = 'yourdatabasepassword';
    $sgc_db_name = 'yourdatabasename';
    $sgcsmsc = new mysqli('localhost', $sgc_db_username, $sgc_db_password, $sgc_db_name);
    if($sgcsmsc->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
    
    $sgcsqlinsert = "INSERT INTO `misscall_response` (`mobile`, `misscalto`)
        VALUES ('".$oMC2fa->getMobile()."', '".$oMC2fa->getMissCallTo()."')";

    if ($sgcsmsc->query($sgcsqlinsert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sgcsqlinsert . "<br>" . $sgcsmsc->error;
    }
    $sgcsmsc->close();


//class for OTP SMS Callback
class misscall2facallback {

    private $mobile;
    private $createTime;
    private $expiryTime;
    private $retryAfter;
    private $misscallto;
    private $type;
    private $method;
    private $status;
    private $reason;

    public function __construct($REQUEST) {
        $this->mobile = $REQUEST['mobile'];//recipient mobile number
        $this->createTime = $REQUEST['createTime'];//time in unix format
        $this->expiryTime = $REQUEST['expiryTime'];//time in unix format
        $this->retryAfter = $REQUEST['retryAfter'];//time in unix format
        $this->misscallto = $REQUEST['missCallTo'];//otp code
        $this->type = $REQUEST['type'];//new|existing
        $this->method = $REQUEST['method'];//generate|verify
        $this->status = $REQUEST['status']; //success|fail
        $this->reason = $REQUEST['reason']; //Actual reason
    }

    function getMobile() {
        return $this->mobile;
    }

    function getCreateTime() {
        return $this->createTime;
    }

    function getExpiryTime() {
        return $this->expiryTime;
    }

    function getRetryAfter() {
        return $this->retryAfter;
    }
    
    function getMissCallTo() {
        return $this->misscallto;
    }

    function getType() {
        return $this->type;
    }

    function getMethod() {
        return $this->method;
    }

    function getStatus() {
        return $this->status;
    }

    function getReason() {
        return $this->reason;
    }
}