<?php 
namespace App\Http\Helpers;
use Log;
class SmsHelper {
    private $api_url        = "http://trans.instaclicksms.in/sendsms.jsp?user={sender_id}&password={password}&mobiles={mobile}&sms={message}";
    private $predefine_sms  = "";
    private $return_data    = "";
    private $this_curl     = "";
    public function Send($to, $sms){
        return $this->sms_api_send($to, $sms);
    }
    private function sms_api_send($to, $sms){
        // replacing sender_id and password 
        $this->api_url = str_replace('{sender_id}', env('SMS_USER_NAME'), $this->api_url);
        $this->api_url = str_replace('{password}', env('SMS_USER_PASSWORD'), $this->api_url);
        $this->api_url = str_replace('{mobile}', '91'.$to, $this->api_url);
        $this->api_url = str_replace('{message}', urlencode($sms), $this->api_url);
        if(!function_exists('curl_version')){
            Log::info('SMS OTP : Curl is not enabled.');
            return false;
        }
        Log::info('SMS OTP : URL'.$this->api_url);
        $curl = curl_init($this->api_url);
        // curl_setopt($curl, CURLOPT_HTTPGET, $this->api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->return_data = curl_exec($curl);
        curl_close($curl);
        
        return true;
    }
    public function setSenderDetails($details = []){
        $this->sender_id    = $details['sender_id'];
        $this->password     = $details['password'];
        $this->api_url      = $details['api_url'];
        return true;
    }
}
// $ch = curl_init("http://trans.instaclicksms.in/sendsms.jsp?user=$user&password=$password&mobiles=$m&sms=".$messg);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $ch = curl_exec($ch);