<?php
require_once "core/bootstrap.php";

\Core\Router::load('routers')
    ->run();