<?php 
namespace App\Http\Helpers;
class SmsHelper {
    private $sender_id      = "";
    private $password       = "";
    private $api_url        = "";
    private $predefine_sms  = "";
    private $return_data    = "";
    private $this_curl     = "";
    public static function Send($to, $sms){
        $this->sms_api_send($sms);
        return $return_data;
    }
    private function sms_api_send($sms){
        // replacing sender_id and password 
        $this->api_url = str_replace('{sender_id}', $this->sender_id, $this->api_url);
        $this->api_url = str_replace('{password}', $this->password, $this->api_url);
        $this->api_url = str_replace('{message}', urldecode($sms), $this->api_url);
        if(!function_exists('curl_version')){
            Log::info('SMS OTP : Curl is not enabled.');
            return false;
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPGET, $this->api_url);
        $this->return_data = curl_exec($curl);
        curl_close();
        Log::info('SMS OTP : '.$this->return_data);
        return $this->return_data;
    }
    public function setSenderDetails($details = []){
        $this->sender_id    = $details['sender_id'];
        $this->password     = $details['password'];
        $this->api_url      = $details['api_url'];
        return true;
    }
}