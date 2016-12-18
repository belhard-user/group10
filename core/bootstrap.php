<?php
use Core\App;
use Core\Router;
use Core\Database\Connector;
use Core\Database\QueryBuilder;

session_start();

require "vendor/autoload.php";

App::set('config', require "config.php");
App::set('query', new QueryBuilder( Connector::getConnection(App::get('config')['database']) ));

$title = 'Мой Сайт';
$pageTitle = "Мой Сайт";

$routers = new Router();