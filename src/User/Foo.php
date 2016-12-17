<?php

namespace Acme\User;

class Foo
{
    protected $log;
    public function __construct(LoggerInterface $logger = null)
    {
        echo __CLASS__ . '<br>';

        foo();
        bar();

        new \Acme\Foo();
    }
}