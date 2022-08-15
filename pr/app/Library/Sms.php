<?php


namespace App\Library;


class Sms
{
    //const API_URL = 'http://ippanel.com:8080/?apikey=';
    //const API_KEY = 'hxvWFg2984seCoXy4YsuUN1ik3gR0KN2YliXAp5uQWM=';
    const API_URL = 'https://ippanel.com/patterns/pattern?username=';
    const username = '09126896736';
    const password = '987Moh456$';
    public $fnum = "+985000125475",
        $tnum,
        $input_data,
        $pid = "ku43mnjqdc",
        $p1,
        $isTransactional = FALSE,
        $v1,
        $message;

    public $to;

    public function __construct($tnum,array $input_data)
    {
        $this->tnum = $tnum;
        $this->input_data = $input_data;
    }

    public function sendsms()
    {

        $post = [
            'username' => self::username,
            'password' => urlencode(self::password),
            'from' => $this->fnum,
            'to' => $this->tnum,
            'input_data' => urlencode(json_encode($this->input_data)),
            'pattern_code' => $this->pid,
            'isTransactional'  => $this->isTransactional,
        ];
        //echo "<pre>"; print_r($post); die;
        $url = "https://ippanel.com/patterns/pattern?username=" . self::username . "&password=" . urlencode(self::password) . "&from=$this->fnum&to=" . json_encode($this->tnum) . "&input_data=" . urlencode(json_encode($this->input_data)) . "&pattern_code=$this->pid";
        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->input_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt_array($ch, [
//                CURLOPT_URL => self::API_URL,
//                CURLOPT_POST => TRUE,
//                CURLOPT_POSTFIELDS => $post,
//                CURLOPT_RETURNTRANSFER => TRUE,
//                CURLOPT_HEADER => FALSE,
//                CURLOPT_SSL_VERIFYPEER => FALSE,
//            ]);

            curl_exec($ch);
            curl_close($ch);

            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }
    }
}
