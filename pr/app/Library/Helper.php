<?php


namespace App\Library;

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Session;

//use Stichoza\GoogleTranslate\GoogleTranslate;

class Helper
{
//    private static  $translator;
//
//    public static function translate($text){
//        if(!self::$translator)
//            self::$translator = new GoogleTranslate('fa'); // Translates into English
//        return self::$translator->translate($text);
//    }

    public static function compare($str_a, $str_b)
    {
        $length = strlen($str_a);
        $length_b = strlen($str_b);

        $i = 0;
        $segmentcount = 0;
        $segmentsinfo = array();
        $segment = '';
        while ($i < $length) {
            $char = substr($str_a, $i, 1);
            if (strpos($str_b, $char) !== FALSE) {
                $segment = $segment . $char;
                if (strpos($str_b, $segment) !== FALSE) {
                    $segmentpos_a = $i - strlen($segment) + 1;
                    $segmentpos_b = strpos($str_b, $segment);
                    $positiondiff = abs($segmentpos_a - $segmentpos_b);
                    $posfactor = ($length - $positiondiff) / $length_b; // <-- ?
                    $lengthfactor = strlen($segment) / $length;
                    $segmentsinfo[$segmentcount] = array('segment' => $segment, 'score' => ($posfactor * $lengthfactor));
                } else {
                    $segment = '';
                    $i--;
                    $segmentcount++;
                }
            } else {
                $segment = '';
                $segmentcount++;
            }
            $i++;
        }

        // PHP 5.3 lambda in array_map
        $totalscore = array_sum(array_map(function ($v) {
            return $v['score'];
        }, $segmentsinfo));
        return $totalscore;
    }

    public static function isValidNationalCode($code)
    {
        if (!preg_match('/^[0-9]{10}$/', $code))
            return false;
        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $code))
                return false;
        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum += ((10 - $i) * intval(substr($code, $i, 1)));
        $ret = $sum % 11;
        $parity = intval(substr($code, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
            return true;
        return false;
    }

    public static function ConvertDateNumberToDateNameShamsi($number)
    {

        $month = ['', 'فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
        return $month[$number] ?? '';

    }

    public static function dayAgo($date)
    {
        $date = new Verta($date);
        $now_date = Carbon::now();
        $now_date = new Verta($now_date);
        if ($date) {
            return $date->formatDifference($now_date);
        }


    }

    public static function convertToEnNumber($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    public static function convertToEnNumberInputs($inputs = [], $keys = [])
    {

        $_i = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $inputs))
                $_i[$key] = Helper::convertToEnNumber($inputs[$key]);
        }

        return array_merge($inputs, $_i);

    }


    public static function convertToFANumber($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $convertedPersianNums = str_replace($english, $persian, $string);

        return $convertedPersianNums;
    }

    public static function createCaptcha()
    {

        $image = imagecreate(100, 40);
        $text = '';
        for ($i = 0; $i < 5; $i++) {
            $number = rand(1, 9);
            $text .= $number;
            $bdColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
            $tColor = imagecolorallocate($image, rand(100, 255), rand(100, 255), rand(110, 255));
            imagefttext($image, rand(18, 25), rand(-15, 15), $i * 18 + 4, rand(20, 30), $tColor, "./font/BFarnaz.ttf", $number);
        }

        Session::put('Captcha', $text);
        Session::save();
        header("Content-Type: image/jpeg");
        imagejpeg($image);
        imagedestroy($image);
    }

    public static function SeoFix($string)
    {
        $fixingString = $string;
        $fixingString = preg_replace("/[^a-z0-9.]+/i", "_", $fixingString);
        $fixingString = trim($fixingString, "_");
        $fixingString = trim($fixingString);

        return $fixingString;
    }

    public static function SeoFixFa($string)
    {

        return str_replace(" ", "-", trim($string));
    }

    public static function isValidTimeStamp($timestamp)
    {
        return ((string)(int)$timestamp === $timestamp)
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }

    /**
     * Find the position of the Xth occurrence of a substring in a string
     * @param $haystack
     * @param $needle
     * @param $number integer > 0
     * @return int
     */
    public static function strposX($haystack, $needle, $number)
    {
        if ($number == '1') {
            return strpos($haystack, $needle);
        } elseif ($number > '1') {
            return strpos($haystack, $needle, self::strposX($haystack, $needle, $number - 1) + strlen($needle));
        } else {
            return error_log('Error: Value for parameter $number is out of range');
        }
    }

    public static function daysBetween($dt1, $dt2)
    {
        return date_diff(
            date_create($dt2),
            date_create($dt1)
        )->format('%a');
    }

    public static function DateFormat($date)
    {
        $v = verta($date);

        return $v->format('%B %d، %Y'); // دی 07، 1395

    }

    /**
     * check is string is json or not
     *
     * @param $string
     * @return bool|mixed
     */
    public static function isJson($string)
    {

        if (is_string($string)) {
            $j = json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE ? $j : false);
        }
        return false;

    }

    public static function convertDateToFa($date, $textPlain = false, $format = null)
    {

        $v = new Verta($date);

        if ($format)
            $v->format($format);

        if (!$textPlain)
            $v = "<span style='direction:ltr; display: inline-block'>$v</span>";

        return $v;

    }


    /**
     * Create or update a record matching the attributes, and fill it with values.
     *
     * @param array $search
     * @param array $values
     * @return static
     */
    public static function updateOrCreate($model, array $search, array $values = array())
    {
        $instance = $model::firstOrCreate($search, $values);
        $instance->fill($values)->save();

        return $instance;
    }

    public static function DateNameShamsiToConvertDateNumber($string)
    {

        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string = str_replace($persianDecimal, $newNumbers, $string);
        $string = str_replace($arabicDecimal, $newNumbers, $string);
        $string = str_replace($arabic, $newNumbers, $string);
        $f = str_replace($persian, $newNumbers, $string);


        $arr = explode("/", $f);
        $a = [];
        foreach ($arr as $key => $value) {
            array_push($a, $value);
        }


        return $z = (implode('-', Verta::getGregorian((int)($a[0]), (int)($a[1]), (int)($a[2]))) . ' ' . '00:00:00');
    }

    public static function ConvertDateToDateShamsi($string)
    {
        $newNumbers = range(0, 9);
        // 1. Persian HTML decimal
        $persianDecimal = array('&#1776;', '&#1777;', '&#1778;', '&#1779;', '&#1780;', '&#1781;', '&#1782;', '&#1783;', '&#1784;', '&#1785;');
        // 2. Arabic HTML decimal
        $arabicDecimal = array('&#1632;', '&#1633;', '&#1634;', '&#1635;', '&#1636;', '&#1637;', '&#1638;', '&#1639;', '&#1640;', '&#1641;');
        // 3. Arabic Numeric
        $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        // 4. Persian Numeric
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');

        $string = str_replace($persianDecimal, $newNumbers, $string);
        $string = str_replace($arabicDecimal, $newNumbers, $string);
        $string = str_replace($arabic, $newNumbers, $string);
        $f = str_replace($persian, $newNumbers, $string);


        $arr = explode("-", $f);
        $a = [];
        foreach ($arr as $key => $value) {
            array_push($a, $value);
        }

        $arr1 = explode(" ", $a[2]);
//        foreach ($arr1 as $key=>$value) {
//            array_push($a,$value);
//        }
        //dd($arr1[0]);
        return $z = (implode('/', Verta::getJalali((int)($a[0]), (int)($a[1]), (int)($arr1[0]))));
    }

    public static function slugfix($string)
    {

        return str_replace(" ", "-", trim($string));
    }

    public static function namefix($string)
    {
        return str_replace(" ", "", trim($string));
    }

    public static function generatecode()
    {
        $generatecode = "";
        $length = 15;
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $generatecode .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $generatecode;
    }

    public static function generatecodes()
    {
        $generatecode = "";
        $length = 8;
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $generatecode .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $generatecode;
    }

    public static function generatecarts()
    {
        $generatecarts = "";
        $length = 6;
        $codeAlphabet = "com";
        $codeAlphabet .= "0123456789";
        //$max = strlen($codeAlphabet);
        for ($i = 0; $i < $length; $i++) {
            $generatecarts .= $codeAlphabet;
        }
        return $generatecarts;
    }

    public static function sendSMSinfo($phone_number, $message)
    {
        $urlsite = "http://185.94.99.84/webservice/url/send.php?";
        //$to = $phone_number;
        $username = "afshinhd";
        $password = '13700731';
        $from = "+1000010003000";
        $method = "sendsms";
        $url = $urlsite . "method=" . $method . "&from=" . $from . "&to=" . $phone_number . "&msg=" . $message . "&uname=" . $username . "&pass=" . $password;
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        //curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($handler);

        $response2 = json_decode($response2);
    }

    public static function bankCardCheck($card = '', $irCard = true)
    {
        $card = (string)preg_replace('/\D/', '', $card);
        $strlen = strlen($card);
        if ($irCard == true and $strlen != 16)
            return false;
        if ($irCard != true and ($strlen < 13 or $strlen > 19))
            return false;
        if (!in_array($card[0], [2, 4, 5, 6, 9]))
            return false;

        for ($i = 0; $i < $strlen; $i++) {
            $res[$i] = $card[$i];
            if (($strlen % 2) == ($i % 2)) {
                $res[$i] *= 2;
                if ($res[$i] > 9)
                    $res[$i] -= 9;
            }
        }
        return array_sum($res) % 10 == 0 ? true : false;
    }

    public static function shabaBankcheck($card = '', $irCard = true)
    {
        $card = (string)preg_replace('/\D/', '', $card);
        $strlen = strlen($card);
        if ($irCard == true and $strlen != 24)
            return false;

        if ($irCard == true and $strlen == 24)
            return true;
        //dd($strlen);
    }
    public static function numberfix($string)
    {
        return str_replace("-", "", trim($string));
    }


}
