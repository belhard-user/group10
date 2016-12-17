<?php

require "vendor/autoload.php";
use Acme\Foo;

foo();
bar();

new User();
new UserRepository();
new Git();

new \Acme\User\Foo();

$names = [
    'boss' => 'Morpheus',
    'the one' => 'Neo'
];

dump([1, 2, 3, 4], new Foo(), $names);