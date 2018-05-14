<?php namespace Cryptex;

use \Exception;


class Algorithm
{
    public $config;

    /**
     * Algorithm constructor.
     */
    public function __construct()
    {
        $this->config = include(dirname(__FILE__) . '/../../config/cryptex.php');
    }
    /**
     * @param $str
     * @return string
     */
    public static function rc4Encryption($str)
    {
        try {
            $instance = new Algorithm();
            $config = $instance->config['rc4'];

            ///// Algorithm Implementation

            $key = $config['key'];

            $s = array();
            for ($i = 0; $i < 256; $i++) {
                $s[$i] = $i;
            }
            $j = 0;
            for ($i = 0; $i < 256; $i++) {
                $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
            }
            $i = 0;
            $j = 0;
            $res = '';
            for ($y = 0; $y < strlen($str); $y++) {
                $i = ($i + 1) % 256;
                $j = ($j + $s[$i]) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
                $res .= $str[$y] ^ chr($s[($s[$i] + $s[$j]) % 256]);
            }
            return bin2hex($res);

            ////// Algorithm Implementation

        } catch (Exception $e) {
            return "Sorry, there was an error: " . $e->getMessage();
        }
    }
    /**
     * @param $str
     * @return string
     */
    public static function rc4Decryption($str)
    {
        try {
            $instance = new Algorithm();
            $config = $instance->config['rc4'];

            ///// Algorithm Implementation

            $key = $config['key'];
            $str = hex2bin($str);

            $s = array();
            for ($i = 0; $i < 256; $i++) {
                $s[$i] = $i;
            }
            $j = 0;
            for ($i = 0; $i < 256; $i++) {
                $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
            }
            $i = 0;
            $j = 0;
            $res = '';
            for ($y = 0; $y < strlen($str); $y++) {
                $i = ($i + 1) % 256;
                $j = ($j + $s[$i]) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
                $res .= $str[$y] ^ chr($s[($s[$i] + $s[$j]) % 256]);
            }
            return $res;

            ////// Algorithm Implementation

        } catch (Exception $e) {
            return "Sorry, there was an error: " . $e->getMessage();
        }
    }


}