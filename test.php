<?php

namespace App\Smart;


use Errors\Exception;

require "t.php";

class MyClass extends Exception {}


\Errors\bar();

echo \Errors\TEST;