<?php namespace Cryptex;

require "Algorithm/Algorithm.php";

use Cryptex\Algorithm;

/**
 *
 *
 * @category   PHP, Laravel
 * @version    1.0.0
 * @package    yousifnimah/Cryptex
 * @copyright  Copyright (c) 2018 - 2019 Cryptex
 * @author     Yousif N. Abbass <me@yousif.io>
 */
class Cryptex
{
    protected $algorithm;


    /**
     * @param null $plainText
     * @return mixed
     */
    public function encrypt($plainText = null){

        $algorithm = $this->algorithm."Encryption";
        return Algorithm::{$algorithm}($plainText);

    }

    public function decrypt($cipherText = null){

        $algorithm = $this->algorithm."Decryption";
        return Algorithm::{$algorithm}($cipherText);

    }

    /**
     * @param string $name
     */
    public function setAlgorithm($name = 'rc4'){
        $this->algorithm = $name;
    }

}