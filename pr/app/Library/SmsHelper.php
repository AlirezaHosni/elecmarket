<?php


namespace App\Library;


class SmsHelper
{
    #urlippanel
    const Sms_url = "https://ippanel.com/patterns/pattern?username=";
    const Username = "09126896736";
    #username ippanel
    const Pass = "987Moh456$";
    #pass ippanel
    public $from,
    $to,
    $subject, $pattern_code;
    public function __construct($from,array $to, $subject,$pattern_code)
    {
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
        $this->pattern_code = $pattern_code;
    }

    public function sendsms()
    {
        $url = self::Sms_url . self::Username . "&password=" . urlencode(self::Pass) . "&from=$this->from&to=" . json_encode($this->to) . "&input_data=" . urlencode(json_encode($this->subject)) . "&pattern_code=$this->pattern_code";
        try {
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $this->subject);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);
            //echo '<pre>'; print_r($response);die;
            //return TRUE;
        } catch(Exception $ex) {
            return FALSE;
        }
    }
}
