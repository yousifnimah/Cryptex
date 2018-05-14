<?php

require "src/LeonardoDaVinci/Cryptex/Cryptex.php";

use Cryptex\Cryptex;

$crypt = new Cryptex;
$crypt->setAlgorithm('rc4');

$cipher = $crypt->encrypt('Hello');
$plainText = $crypt->decrypt($cipher);


var_dump($cipher);
var_dump($plainText);